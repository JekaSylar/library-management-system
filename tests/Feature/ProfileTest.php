<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Inertia\Testing\AssertableInertia as Assert;

it('a guest cannot open the profile page', function () {
    $this->get(route('profile.edit'))
        ->assertRedirect('/login');
});

it('a guest cannot update their profile', function () {
    $this->put(route('profile.update'), [
        'name' => 'New Name',
    ])->assertRedirect('/login');
});

it('an authenticated user can open the profile page', function () {
    $user = User::factory()->create([
        'is_admin' => true,
    ]);

    $this->actingAs($user)
        ->get(route('profile.edit'))
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page
            ->component('profile/edit')
            ->has('user')
        );
});

it('a user cannot update someone else\'s profile by replacing the ID', function () {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create(['name' => 'Original Name']);

    $this->actingAs($user1)->put(route('profile.update'), [
        'id' => $user2->id,
        'name' => 'New Name',
    ]);

    expect($user2->fresh()->name)->toBe('Original Name');
    expect($user1->fresh()->name)->toBe('New Name');
});

it('name is a required field', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->put(route('profile.update'), [
            'name' => '',
        ])
        ->assertSessionHasErrors('name');
});

it('the user can update only the name leaving the password fields blank', function () {
    $user = User::factory()->create(['name' => 'Old Name']);

    $this->actingAs($user)
        ->put(route('profile.update'), [
            'name' => 'New Name',
            'current_password' => '',
            'password' => '',
            'password_confirmation' => '',
        ])
        ->assertSessionHasNoErrors()
        ->assertRedirect();

    expect($user->fresh()->name)->toBe('New Name');
});

it('the user can successfully change their password', function () {
    $user = User::factory()->create([
        'password' => Hash::make('old-password-123'),
    ]);

    $this->actingAs($user)
        ->put(route('profile.update'), [
            'name' => 'Test',
            'current_password' => 'old-password-123',
            'password' => 'new-password-123',
            'password_confirmation' => 'new-password-123',
        ])
        ->assertSessionHasNoErrors();

    $this->assertTrue(Hash::check('new-password-123', $user->fresh()->password));
});

it('error if the current password is entered incorrectly', function () {
    $user = User::factory()->create([
        'password' => Hash::make('old-password-123'),
    ]);

    $this->actingAs($user)
        ->put(route('profile.update'), [
            'name' => 'Test',
            'current_password' => 'wrong-password',
            'password' => 'new-password-123',
            'password_confirmation' => 'new-password-123',
        ])
        ->assertSessionHasErrors('current_password');

    $this->assertTrue(Hash::check('old-password-123', $user->fresh()->password));
});

it('error if the new password and the confirmation do not match', function () {
    $user = User::factory()->create([
        'password' => Hash::make('old-password-123'),
    ]);

    $this->actingAs($user)
        ->put(route('profile.update'), [
            'name' => 'Test',
            'current_password' => 'old-password-123',
            'password' => 'new-password-123',
            'password_confirmation' => 'mismatch-password',
        ])
        ->assertSessionHasErrors('password');
});
