<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Producto</title>
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
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 1rem;
            border-radius: 4px;
            margin: 2rem 0;
        }
        .product-info {
            background-color: #f9f9f9;
            padding: 1.5rem;
            border-radius: 4px;
            margin: 2rem 0;
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
        .btn-danger {
            background-color: #e74c3c;
            color: white;
        }
        .btn-danger:hover {
            background-color: #c0392b;
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
        <h1>Eliminar Producto</h1>

        <div class="alert-danger">
            <p><strong>⚠️ Advertencia:</strong> Esta acción es irreversible. Una vez eliminado el producto no podrá recuperarse.</p>
        </div>

        <div class="product-info">
            <h3 style="margin-bottom: 1rem; color: #2c3e50;">Detalles del producto a eliminar:</h3>
            <p><strong>Nombre:</strong> Producto Ejemplo</p>
            <p><strong>Descripción:</strong> Esta es la descripción del producto</p>
            <p><strong>Precio:</strong> $99.99</p>
            <p><strong>Cantidad:</strong> 10</p>
        </div>

        <p style="margin: 2rem 0; color: #e74c3c; font-weight: bold;">¿Estás completamente seguro de que deseas eliminar este producto?</p>

        <form action="/producto/1" method="DELETE" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Realmente deseas eliminarlo?')">Sí, eliminar producto</button>
        </form>
        <a href="{{ route('productos.show') }}" class="btn btn-secondary">Cancelar</a>
    </main>
</body>
</html>
