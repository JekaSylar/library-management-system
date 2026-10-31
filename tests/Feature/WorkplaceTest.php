<?php

use App\Models\User;
use App\Models\Workplace;
use Inertia\Testing\AssertableInertia as Assert;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;


function createAdmin() {
    return User::factory()->create(['is_admin' => true]);
}

function createUser() {
    return User::factory()->create(['is_admin' => false]);
}


it('restricts access to unauthorized users and non-admins', function () {

    get(route('workplaces.index'))->assertRedirect(route('login'));


    $user = createUser();
    actingAs($user)->get(route('workplaces.index'))->assertStatus(403);
});


it('allows the admin to view the page and checks how the Inertia component is displayed', function () {
    $admin = createAdmin();


    Workplace::factory()->create(['name' => 'Тестова філія']);

    actingAs($admin)
        ->get(route('workplaces.index'))
        ->assertStatus(200)
        ->assertInertia(fn (Assert $page) => $page
            ->component('workplace/index')
            ->has('workplaces')
        );
});


it('allows the administrator to create a workstation (including manually entering an address without Nova Poshta)', function () {
    $admin = createAdmin();

    $data = [
        'name' => 'Нова Філія №10',
        'city' => 'м. Київ',
        'street' => 'вул. Хрещатик',
        'house' => '1',
        'housing' => 'А',
        'apartment' => '12',
        'is_active' => true,
    ];

    actingAs($admin)
        ->post(route('workplaces.store'), $data)
        ->assertRedirect();


    assertDatabaseHas('workplaces', [
        'name' => 'Нова Філія №10',
        'city' => 'м. Київ',
        'is_active' => true,
    ]);
});


it('allows the administrator to edit a workstation', function () {
    $admin = createAdmin();
    $workplace = Workplace::factory()->create([
        'name' => 'Стара Назва',
        'is_active' => true,
    ]);

    $updateData = [
        'name' => 'Оновлена Назва',
        'city' => 'м. Львів',
        'street' => 'вул. Франка',
        'house' => '20',
        'is_active' => false,
    ];

    actingAs($admin)
        ->put(route('workplaces.update', $workplace->id), $updateData)
        ->assertRedirect();


    assertDatabaseHas('workplaces', [
        'id' => $workplace->id,
        'name' => 'Оновлена Назва',
        'city' => 'м. Львів',
        'is_active' => false,
    ]);
});


it('allows the administrator to delete a workstation', function () {
    $admin = createAdmin();
    $workplace = Workplace::factory()->create();


    assertDatabaseHas('workplaces', ['id' => $workplace->id]);

    actingAs($admin)
        ->delete(route('workplaces.destroy', $workplace->id))
        ->assertRedirect();


    assertDatabaseMissing('workplaces', ['id' => $workplace->id]);
});


it('displays a validation error if required fields are left blank', function () {
    $admin = createAdmin();


    actingAs($admin)
        ->post(route('workplaces.store'), [])
        ->assertSessionHasErrors(['name', 'city', 'street']);
});


it('successfully saves the location without specifying the building or apartment (optional fields)', function () {
    $admin = createAdmin();


    $data = [
        'name' => 'Мінімальна філія',
        'city' => 'м. Одеса',
        'street' => 'вул. Дерибасівська',
        'house' => '2',
        'is_active' => true,
    ];

    actingAs($admin)
        ->post(route('workplaces.store'), $data)
        ->assertSessionHasNoErrors()
        ->assertRedirect();


    assertDatabaseHas('workplaces', [
        'name' => 'Мінімальна філія',
        'housing' => null,
        'apartment' => null,
    ]);
});
