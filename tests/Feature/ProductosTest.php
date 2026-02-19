<?php

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\User;

test('guest cannot access products index', function () {
    $this->get(route('productos.index'))
        ->assertRedirect(route('login'));
});

test('authenticated user can access products index', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('productos.index'))
        ->assertStatus(200);
});

test('owner can view product', function () {
    $user = User::factory()->create();
    $producto = Producto::factory()->for($user, 'user')->create();

    $this->actingAs($user)
        ->get(route('productos.show', $producto->id))
        ->assertStatus(200);
});

test('user cannot view product of others', function () {
    $owner = User::factory()->create();
    $otro = User::factory()->create();
    $producto = Producto::factory()->for($owner, 'user')->create();

    $this->actingAs($otro)
        ->get(route('productos.show', $producto->id))
        ->assertForbidden();
});

test('owner can create product', function () {
    $user = User::factory()->create();
    $categoria = Categoria::factory()->create();

    $data = [
        'nombre' => 'Producto Test',
        'descripcion' => 'Descripcion de prueba',
        'precio' => 199.99,
        'cantidad' => 1500000000,
        'categoria_id' => $categoria->id,
    ];

    $this->actingAs($user)
        ->post(route('productos.store'), $data)
        ->assertRedirect(route('productos.index'));

    $this->assertDatabaseHas('productos_tabla', [
        'nombre' => 'Producto Test',
        'user_id' => $user->id,
        'categoria_id' => $categoria->id,
    ]);
});

test('product validation fails on create', function () {
    $user = User::factory()->create();
    $categoria = Categoria::factory()->create();

    $data = [
        'nombre' => '',
        'descripcion' => str_repeat('a', 10),
        'precio' => -10,
        'cantidad' => -5,
        'categoria_id' => $categoria->id,
    ];

    $this->actingAs($user)
        ->post(route('productos.store'), $data)
        ->assertSessionHasErrors(['nombre', 'precio', 'cantidad']);
});

test('owner can update product', function () {
    $user = User::factory()->create();
    $categoria = Categoria::factory()->create();
    $nuevaCategoria = Categoria::factory()->create();
    $producto = Producto::factory()
        ->for($user, 'user')
        ->for($categoria, 'categoria')
        ->create();

    $data = [
        'nombre' => 'Producto Actualizado',
        'descripcion' => 'Nueva descripcion',
        'precio' => 250.50,
        'cantidad' => 10,
        'categoria_id' => $nuevaCategoria->id,
    ];

    $this->actingAs($user)
        ->put(route('productos.update', $producto->id), $data)
        ->assertRedirect(route('productos.index'));

    $this->assertDatabaseHas('productos_tabla', [
        'id' => $producto->id,
        'nombre' => 'Producto Actualizado',
        'categoria_id' => $nuevaCategoria->id,
    ]);
});

test('user cannot update product of others', function () {
    $owner = User::factory()->create();
    $otro = User::factory()->create();
    $categoria = Categoria::factory()->create();
    $producto = Producto::factory()->for($owner, 'user')->for($categoria, 'categoria')->create();

    $data = [
        'nombre' => 'Intento',
        'descripcion' => 'Intento',
        'precio' => 10,
        'cantidad' => 1,
        'categoria_id' => $categoria->id,
    ];

    $this->actingAs($otro)
        ->put(route('productos.update', $producto->id), $data)
        ->assertForbidden();
});

test('owner can delete product', function () {
    $user = User::factory()->create();
    $producto = Producto::factory()->for($user, 'user')->create();

    $this->actingAs($user)
        ->delete(route('productos.destroy', $producto->id))
        ->assertRedirect(route('productos.index'));

    $this->assertDatabaseMissing('productos_tabla', [
        'id' => $producto->id,
    ]);
});

test('user cannot delete product of others', function () {
    $owner = User::factory()->create();
    $otro = User::factory()->create();
    $producto = Producto::factory()->for($owner, 'user')->create();

    $this->actingAs($otro)
        ->delete(route('productos.destroy', $producto->id))
        ->assertForbidden();
});
