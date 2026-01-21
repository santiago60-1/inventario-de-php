<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-color: #f5f5f5;
                color: #333;
            }
            header {
                background-color: #2c3e50;
                color: white;
                padding: 1rem 2rem;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }
            header h1 {
                font-size: 1.5rem;
            }
            nav {
                background-color: #34495e;
                padding: 0;
            }
            nav ul {
                list-style: none;
                display: flex;
                margin: 0;
                padding: 0;
            }
            nav li {
                margin: 0;
            }
            nav a {
                display: block;
                color: white;
                text-decoration: none;
                padding: 1rem 1.5rem;
                transition: background-color 0.3s;
            }
            nav a:hover {
                background-color: #2c3e50;
            }
            main {
                max-width: 1200px;
                margin: 2rem auto;
                padding: 0 2rem;
                background-color: white;
                padding: 2rem;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }
            h1 {
                color: #2c3e50;
                margin-bottom: 1.5rem;
                border-bottom: 2px solid #e74c3c;
                padding-bottom: 0.5rem;
            }
            p {
                margin: 1rem 0;
                line-height: 1.6;
            }
            .btn-container {
                display: flex;
                gap: 1rem;
                margin: 2rem 0;
            }
            a.btn {
                padding: 0.75rem 1.5rem;
                border-radius: 4px;
                text-decoration: none;
                display: inline-block;
                transition: background-color 0.3s;
                font-weight: 500;
            }
            a.btn-primary {
                background-color: #3498db;
                color: white;
            }
            a.btn-primary:hover {
                background-color: #2980b9;
            }
            a.btn-success {
                background-color: #27ae60;
                color: white;
            }
            a.btn-success:hover {
                background-color: #229954;
            }
            ul.features {
                list-style: none;
                margin: 2rem 0;
            }
            ul.features li {
                padding: 0.75rem;
                margin: 0.5rem 0;
                background-color: #ecf0f1;
                border-left: 4px solid #e74c3c;
                border-radius: 4px;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>📦 Sistema de Inventario</h1>
        </header>

        <nav>
            <ul>
                <li><a href="{{ route('productos.index') }}">Inicio</a></li>
                <li><a href="{{ route('productos.show') }}">Ver Productos</a></li>
                <li><a href="{{ route('productos.create') }}">Crear Producto</a></li>
            </ul>
        </nav>

        <main>
            <h1>Bienvenido al Sistema de Inventario</h1>
            <p>Gestiona tus productos de forma eficiente y organizada.</p>

            <div class="btn-container">
                <a href="{{ route('productos.show') }}" class="btn btn-primary">Ver todos los productos</a>
                <a href="{{ route('productos.create') }}" class="btn btn-success">Agregar nuevo producto</a>
            </div>

            <h2 style="margin-top: 3rem; color: #34495e;">Funcionalidades principales</h2>
            <ul class="features">
                <li>📋 Visualizar todos los productos registrados</li>
                <li>➕ Crear nuevos productos</li>
                <li>✏️ Editar información de productos existentes</li>
                <li>🗑️ Eliminar productos del inventario</li>
            </ul>

        </main>
    </body>
</html>
