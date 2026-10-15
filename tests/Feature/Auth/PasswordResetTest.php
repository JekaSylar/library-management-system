
<?php

use App\Models\User;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Inertia\Testing\AssertableInertia as Assert;

uses(RefreshDatabase::class);

it('renders the forgot password page', function () {
    $this->get(route('password.request'))
        ->assertOk()
        ->assertInertia(
            fn (Assert $page) => $page
                ->component('auth/forgot-password')
        );
});

it('sends a password reset link to a registered user', function () {
    Notification::fake();

    $user = User::factory()->create([
        'email' => 'reader@example.com',
    ]);

    $this->post(route('password.email'), [
        'email' => $user->email,
    ])
        ->assertSessionHas('success');

    Notification::assertSentTo(
        $user,
        ResetPasswordNotification::class
    );
});

it('returns an error when requesting a reset link for an unknown email', function () {
    $this->from(route('password.request'))
        ->post(route('password.email'), [
            'email' => 'unknown@example.com',
        ])
        ->assertRedirect(route('password.request'))
        ->assertSessionHas('error');
});

it('renders the reset password page with token and email', function () {
    $token = 'test-reset-token';

    $this->get(route('password.reset', [
        'token' => $token,
        'email' => 'reader@example.com',
    ]))
        ->assertOk()
        ->assertInertia(
            fn (Assert $page) => $page
                ->component('auth/reset-password')
                ->where('token', $token)
                ->where('email', 'reader@example.com')
        );
});

it('resets the user password with a valid token', function () {
    Notification::fake();

    $user = User::factory()->create([
        'email' => 'reader@example.com',
        'password' => Hash::make('OldPassword123!'),
    ]);

    $token = Password::createToken($user);

    $this->post(route('password.update'), [
        'token' => $token,
        'email' => $user->email,
        'password' => 'NewPassword123!',
        'password_confirmation' => 'NewPassword123!',
    ])
        ->assertRedirect(route('login'))
        ->assertSessionHas('success');

    expect(Hash::check(
        'NewPassword123!',
        $user->fresh()->password
    ))->toBeTrue();

    expect(Hash::check(
        'OldPassword123!',
        $user->fresh()->password
    ))->toBeFalse();
});

it('does not reset the password with an invalid token', function () {
    $user = User::factory()->create([
        'email' => 'reader@example.com',
        'password' => Hash::make('OldPassword123!'),
    ]);

    $this->from(route('password.reset', [
        'token' => 'invalid-token',
        'email' => $user->email,
    ]))
        ->post(route('password.update'), [
            'token' => 'invalid-token',
            'email' => $user->email,
            'password' => 'NewPassword123!',
            'password_confirmation' => 'NewPassword123!',
        ])
        ->assertSessionHasErrors('email');

    expect(Hash::check(
        'OldPassword123!',
        $user->fresh()->password
    ))->toBeTrue();
});
