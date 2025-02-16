<?php

use App\Models\Medico;
use App\Models\User;

test('index method returns a view with medicos', function () {
    Medico::factory()->count(15)->create();
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('medicos.index'));

    $response->assertStatus(200)
             ->assertViewIs('medicos.index')
             ->assertViewHas('medicos');
});

test('create method returns the create view', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('medicos.create'));

    $response->assertStatus(200)
             ->assertViewIs('medicos.create');
});

test('store method creates a new medico and redirects', function () {
    $data = [
        'nome' => 'Dr. John Doe',
        'especialidade' => 'Cardiologia',
        'crm' => '12345',
    ];

    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('medicos.store'), $data);

    $response->assertRedirect(route('medicos.index'));
    $this->assertDatabaseHas('medicos', $data);
});

test('show method returns the show view with the medico', function () {
    $medico = Medico::factory()->create();
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('medicos.show', $medico));

    $response->assertStatus(200)
             ->assertViewIs('medicos.show')
             ->assertViewHas('medico', $medico);
});

test('edit method returns the edit view with the medico', function () {
    $medico = Medico::factory()->create();
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('medicos.edit', $medico));

    $response->assertStatus(200)
             ->assertViewIs('medicos.edit')
             ->assertViewHas('medico', $medico);
});

test('update method updates the medico and redirects', function () {
    $medico = Medico::factory()->create();
    $user = User::factory()->create();

    $data = [
        'nome' => 'Dr. Jane Doe',
        'especialidade' => 'Dermatologia',
        'crm' => '54321',
    ];

    $response = $this->actingAs($user)->put(route('medicos.update', $medico), $data);

    $response->assertRedirect(route('medicos.index'));
    $this->assertDatabaseHas('medicos', $data);
});

test('destroy method deletes the medico and redirects', function () {
    $medico = Medico::factory()->create();
    $user = User::factory()->create();

    $response = $this->actingAs($user)->delete(route('medicos.destroy', $medico));

    $response->assertRedirect(route('medicos.index'));
    $this->assertDatabaseMissing('medicos', ['id' => $medico->id]);
});
