<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Producto</title>
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
        }
        nav {
            background-color: #34495e;
        }
        nav ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
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
        .form-group {
            margin-bottom: 1.5rem;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #2c3e50;
        }
        input, textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
            font-size: 1rem;
            font-family: inherit;
        }
        input:focus, textarea:focus {
            outline: none;
            border-color: #e74c3c;
            box-shadow: 0 0 5px rgba(231, 76, 60, 0.5);
        }
        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
            display: inline-block;
            margin-right: 0.5rem;
        }
        .btn-success {
            background-color: #27ae60;
            color: white;
        }
        .btn-success:hover {
            background-color: #229954;
        }
        .btn-secondary {
            background-color: #95a5a6;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #7f8c8d;
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
        <h1>Formulario para crear un producto</h1>

        <form action="/productos/create" method="POST">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre del producto:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingresa el nombre" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4" placeholder="Describe el producto"></textarea>
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" step="0.01" placeholder="0.00" required>
            </div>

            <div style="margin-top: 2rem;">
                <button type="submit" class="btn btn-success">Crear Producto</button>
                <a href="{{ route('productos.show') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </main>
</body>
</html>
