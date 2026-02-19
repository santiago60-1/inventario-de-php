<?php

use App\Models\Categoria;
use App\Models\User;

test('guest cannot access categories index', function () {
    $this->get(route('categorias.index'))
        ->assertRedirect(route('login'));
});

test('authenticated user can access categories index', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('categorias.index'))
        ->assertStatus(200);
});

test('user can create category', function () {
    $user = User::factory()->create();

    $data = [
        'nombre' => 'Bebidas',
        'descripcion' => 'Categoria de bebidas',
    ];

    $this->actingAs($user)
        ->post(route('categorias.store'), $data)
        ->assertRedirect(route('categorias.index'));

    $this->assertDatabaseHas('categorias', [
        'nombre' => 'Bebidas',
    ]);
});

test('category name is required', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post(route('categorias.store'), [
            'nombre' => '',
            'descripcion' => 'x',
        ])
        ->assertSessionHasErrors(['nombre']);
});

test('user can update category', function () {
    $user = User::factory()->create();
    $categoria = Categoria::factory()->create([
        'nombre' => 'Lacteos',
    ]);

    $this->actingAs($user)
        ->put(route('categorias.update', $categoria), [
            'nombre' => 'Lacteos y derivados',
            'descripcion' => 'Actualizada',
        ])
        ->assertRedirect(route('categorias.index'));

    $this->assertDatabaseHas('categorias', [
        'id' => $categoria->id,
        'nombre' => 'Lacteos y derivados',
    ]);
});

test('category name must be unique on update', function () {
    $user = User::factory()->create();
    $categoria = Categoria::factory()->create(['nombre' => 'A']);
    $otra = Categoria::factory()->create(['nombre' => 'B']);

    $this->actingAs($user)
        ->put(route('categorias.update', $categoria), [
            'nombre' => $otra->nombre,
            'descripcion' => 'Intento',
        ])
        ->assertSessionHasErrors(['nombre']);
});

test('user can delete category', function () {
    $user = User::factory()->create();
    $categoria = Categoria::factory()->create();

    $this->actingAs($user)
        ->delete(route('categorias.destroy', $categoria))
        ->assertRedirect(route('categorias.index'));

    $this->assertDatabaseMissing('categorias', [
        'id' => $categoria->id,
    ]);
});

test('deleting non existent category returns 404', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->delete(route('categorias.destroy', 999999))
        ->assertNotFound();
});
