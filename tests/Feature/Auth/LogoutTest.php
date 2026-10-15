
<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('logs out an authenticated user', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post(route('logout'))
        ->assertRedirect(route('login'))
        ->assertSessionHas(
            'success',
            'Ви успішно вийшли з системи'
        );

    $this->assertGuest();
});

it('redirects a guest when requesting logout', function () {
    $this->post(route('logout'))
        ->assertRedirect(route('login'));

    $this->assertGuest();
});
