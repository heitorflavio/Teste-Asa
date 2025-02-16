<?php

use App\Models\User;

test('index method returns a view with users ordered by created_at desc', function () {
    User::factory()->count(15)->create();
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('users.index'));

    $response->assertStatus(200)
        ->assertViewIs('users.index')
        ->assertViewHas('users');
});

test('create method returns the create view', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('users.create'));

    $response->assertStatus(200)
        ->assertViewIs('users.create');
});

test('store method creates a new user and redirects with success message', function () {
    $data = [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ];

    $user = User::factory()->create();
    $response = $this->actingAs($user)->post(route('users.store'), $data);

    $response->assertRedirect(route('users.index'))
        ->assertSessionHas('success', 'Usuário criado com sucesso!');
    $this->assertDatabaseHas('users', ['email' => 'john@example.com']);
});


test('show method returns the show view with the user', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('users.show', $user));

    $response->assertStatus(200)
        ->assertViewIs('users.show')
        ->assertViewHas('user', $user);
});

test('edit method returns the edit view with the user', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('users.edit', $user));

    $response->assertStatus(200)
        ->assertViewIs('users.edit')
        ->assertViewHas('user', $user);
});

test('update method updates the user and redirects with success message', function () {
    $user = User::factory()->create();

    $data = [
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
    ];

    $response = $this->actingAs($user)->put(route('users.update', $user), $data);

    $response->assertRedirect(route('users.index'))
        ->assertSessionHas('success', 'Usuário atualizado com sucesso!');
    $this->assertDatabaseHas('users', ['email' => 'jane@example.com']);
});

test('destroy method deletes the user and redirects with success message', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->delete(route('users.destroy', $user));

    $response->assertRedirect(route('users.index'))
        ->assertSessionHas('success', 'Usuário deletado com sucesso!');
    $this->assertDatabaseMissing('users', ['id' => $user->id]);
});
