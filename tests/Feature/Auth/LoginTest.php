<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Inertia\Testing\AssertableInertia as Assert;

uses(RefreshDatabase::class);

it('renders the login page', function () {
    $this->get(route('login'))
        ->assertOk()
        ->assertInertia(
            fn (Assert $page) => $page
                ->component('auth/login')
        );
});
it('allows a user to log in with valid credentials', function () {
    $user = User::factory()->create([
        'email' => 'reader@example.com',
        'password' => Hash::make('Password123!'),
    ]);

    $this->post(route('login.store'), [
        'email' => 'reader@example.com',
        'password' => 'Password123!',
    ])
        ->assertRedirect(route('dashboard'));

    $this->assertAuthenticatedAs($user);
});

it('does not allow a user to log in with an incorrect password', function () {
    User::factory()->create([
        'email' => 'reader@example.com',
        'password' => Hash::make('Password123!'),
    ]);

    $this->from(route('login'))
        ->post(route('login.store'), [
            'email' => 'reader@example.com',
            'password' => 'WrongPassword123!',
        ])
        ->assertRedirect(route('login'))
        ->assertSessionHas('error')
        ->assertSessionHas('_old_input.email', 'reader@example.com');

    $this->assertGuest();
});
