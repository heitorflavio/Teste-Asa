<?php

use App\Models\Medico;

test('index method returns a view with medicos', function () {
    Medico::factory()->count(15)->create();

    $response = $this->get(route('medicos.index'));

    $response->assertStatus(200)
             ->assertViewIs('medicos.index')
             ->assertViewHas('medicos');
});

test('create method returns the create view', function () {
    $response = $this->get(route('medicos.create'));

    $response->assertStatus(200)
             ->assertViewIs('medicos.create');
});

test('store method creates a new medico and redirects', function () {
    $data = [
        'nome' => 'Dr. John Doe',
        'especialidade' => 'Cardiologia',
        'crm' => '12345',
    ];

    $response = $this->post(route('medicos.store'), $data);

    $response->assertRedirect(route('medicos.index'));
    $this->assertDatabaseHas('medicos', $data);
});

test('show method returns the show view with the medico', function () {
    $medico = Medico::factory()->create();

    $response = $this->get(route('medicos.show', $medico));

    $response->assertStatus(200)
             ->assertViewIs('medicos.show')
             ->assertViewHas('medico', $medico);
});

test('edit method returns the edit view with the medico', function () {
    $medico = Medico::factory()->create();

    $response = $this->get(route('medicos.edit', $medico));

    $response->assertStatus(200)
             ->assertViewIs('medicos.edit')
             ->assertViewHas('medico', $medico);
});

test('update method updates the medico and redirects', function () {
    $medico = Medico::factory()->create();
    $data = [
        'nome' => 'Dr. Jane Doe',
        'especialidade' => 'Dermatologia',
        'crm' => '54321',
    ];

    $response = $this->put(route('medicos.update', $medico), $data);

    $response->assertRedirect(route('medicos.index'));
    $this->assertDatabaseHas('medicos', $data);
});

test('destroy method deletes the medico and redirects', function () {
    $medico = Medico::factory()->create();

    $response = $this->delete(route('medicos.destroy', $medico));

    $response->assertRedirect(route('medicos.index'));
    $this->assertDatabaseMissing('medicos', ['id' => $medico->id]);
});
