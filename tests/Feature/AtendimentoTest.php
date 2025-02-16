<?php

use App\Models\Atendimento;
use App\Models\Medico;
use App\Models\Paciente;

test('index method returns a view with atendimentos', function () {
    Atendimento::factory()->count(15)->create();

    $response = $this->get(route('atendimentos.index'));

    $response->assertStatus(200)
        ->assertViewIs('atendimentos.index')
        ->assertViewHas('atendimentos');
});

test('create method returns the create view', function () {
    $response = $this->get(route('atendimentos.create'));

    $response->assertStatus(200)
        ->assertViewIs('atendimentos.create');
});

test('store method creates a new atendimento and redirects', function () {
    $data = [
        'paciente_id' => Paciente::factory()->create()->id,
        'medico_id' => Medico::factory()->create()->id,
        'data_atendimento' => '2023-10-01 14:00',
    ];

    $response = $this->post(route('atendimentos.store'), $data);

    $response->assertRedirect(route('atendimentos.index'));
    $this->assertDatabaseHas('atendimentos', $data);
});

test('show method returns the show view with the atendimento', function () {
    $atendimento = Atendimento::factory()->create();

    $response = $this->get(route('atendimentos.show', $atendimento));

    $response->assertStatus(200)
        ->assertViewIs('atendimentos.show')
        ->assertViewHas('atendimento', $atendimento);
});

test('edit method returns the edit view with the atendimento', function () {
    $atendimento = Atendimento::factory()->create();

    $response = $this->get(route('atendimentos.edit', $atendimento));

    $response->assertStatus(200)
        ->assertViewIs('atendimentos.edit')
        ->assertViewHas('atendimento', $atendimento);
});

test('update method updates the atendimento and redirects', function () {
    $atendimento = Atendimento::factory()->create();
    $data = [
        'paciente_id' =>  Paciente::factory()->create()->id,
        'medico_id' => Medico::factory()->create()->id,
        'data_atendimento' => '2023-10-01 14:00',
    ];

    $response = $this->put(route('atendimentos.update', $atendimento), $data);

    $response->assertRedirect(route('atendimentos.index'));
    $this->assertDatabaseHas('atendimentos', $data);
});

test('destroy method deletes the atendimento and redirects', function () {
    $atendimento = Atendimento::factory()->create();

    $response = $this->delete(route('atendimentos.destroy', $atendimento));

    $response->assertRedirect(route('atendimentos.index'));
    $this->assertDatabaseMissing('atendimentos', ['id' => $atendimento->id]);
});
