<?php

use App\Models\Paciente;
use App\Models\User;

test('index method returns a view with pacientes', function () {
    Paciente::factory()->count(15)->create();
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('pacientes.index'));

    $response->assertStatus(200)
        ->assertViewIs('pacientes.index')
        ->assertViewHas('pacientes');
});

test('create method returns the create view', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get(route('pacientes.create'));

    $response->assertStatus(200)
        ->assertViewIs('pacientes.create');
});

test('store method creates a new paciente and redirects', function () {
    $data = [
        'nome' => 'John Doe',
        'email' => 'john@example.com',
        'cpf' => '123.456.789-00',
        'data_nascimento' => '1990-01-01',
    ];

    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('pacientes.store'), $data);

    $response->assertRedirect(route('pacientes.index'));
    $this->assertDatabaseHas('pacientes', $data);
});

test('show method returns the show view with the paciente', function () {
    $paciente = Paciente::factory()->create();
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('pacientes.show', $paciente));

    $response->assertStatus(200)
        ->assertViewIs('pacientes.show')
        ->assertViewHas('paciente', $paciente);
});

test('edit method returns the edit view with the paciente', function () {
    $paciente = Paciente::factory()->create();
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('pacientes.edit', $paciente));

    $response->assertStatus(200)
        ->assertViewIs('pacientes.edit')
        ->assertViewHas('paciente', $paciente);
});

test('update method updates the paciente and redirects', function () {
    $paciente = Paciente::factory()->create();
    $user = User::factory()->create();

    $data = [
        'nome' => 'Jane Doe',
        'email' => 'jane@example.com',
        'cpf' => '987.654.321-00',
        'data_nascimento' => '1995-01-01',
    ];

    $response = $this->actingAs($user)->put(route('pacientes.update', $paciente), $data);

    $response->assertRedirect(route('pacientes.index'));
    $this->assertDatabaseHas('pacientes', $data);
});

test('destroy method deletes the paciente and redirects', function () {
    $paciente = Paciente::factory()->create();
    $user = User::factory()->create();

    $response = $this->actingAs($user)->delete(route('pacientes.destroy', $paciente));

    $response->assertRedirect(route('pacientes.index'));
    $this->assertDatabaseMissing('pacientes', ['id' => $paciente->id]);
});
