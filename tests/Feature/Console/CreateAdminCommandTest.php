<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

it('creates an administrator with the supplied credentials', function () {
    $this->artisan('app:create-admin')
        ->expectsQuestion('Name', 'Test Admin')
        ->expectsQuestion('Email', 'admin@example.com')
        ->expectsQuestion('Password', 'StrongPassword123!')
        ->expectsQuestion('Password Confirmation', 'StrongPassword123!')
        ->expectsOutputToContain('Administrator admin@example.com has been successfully created.')
        ->assertSuccessful();

    $user = User::where('email', 'admin@example.com')->first();

    expect($user)->not->toBeNull()
        ->and($user->name)->toBe('Test Admin')
        ->and($user->is_admin)->toBeTrue()
        ->and(Hash::check('StrongPassword123!', $user->password))->toBeTrue()
        ->and($user->password)->not->toBe('StrongPassword123!');
});

it('does not create a user with an invalid email', function () {
    $this->artisan('app:create-admin')
        ->expectsQuestion('Name', 'Test Admin')
        ->expectsQuestion('Email', 'invalid-email')
        ->expectsQuestion('Password', 'StrongPassword123!')
        ->expectsQuestion('Password Confirmation', 'StrongPassword123!')
        ->expectsOutputToContain('Please enter a valid email address.')
        ->assertFailed();

    expect(User::count())->toBe(0);
});

it('does not create a user with a duplicate email', function () {
    User::factory()->create([
        'email' => 'admin@example.com',
    ]);

    $this->artisan('app:create-admin')
        ->expectsQuestion('Name', 'Another Admin')
        ->expectsQuestion('Email', 'admin@example.com')
        ->expectsQuestion('Password', 'StrongPassword123!')
        ->expectsQuestion('Password Confirmation', 'StrongPassword123!')
        ->expectsOutputToContain('A user with this email address already exists.')
        ->assertFailed();

    expect(User::where('email', 'admin@example.com')->count())->toBe(1);
});

it('rejects passwords shorter than eight characters', function () {
    $this->artisan('app:create-admin')
        ->expectsQuestion('Name', 'Test Admin')
        ->expectsQuestion('Email', 'admin@example.com')
        ->expectsQuestion('Password', 'short')
        ->expectsQuestion('Password Confirmation', 'short')
        ->expectsOutputToContain('Password must be at least 8 characters long.')
        ->assertFailed();

    expect(User::count())->toBe(0);
});

it('rejects passwords that do not match', function () {
    $this->artisan('app:create-admin')
        ->expectsQuestion('Name', 'Test Admin')
        ->expectsQuestion('Email', 'admin@example.com')
        ->expectsQuestion('Password', 'StrongPassword123!')
        ->expectsQuestion('Password Confirmation', 'DifferentPassword123!')
        ->expectsOutputToContain('Passwords do not match.')
        ->assertFailed();

    expect(User::count())->toBe(0);
});
