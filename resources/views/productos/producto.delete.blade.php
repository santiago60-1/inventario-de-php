<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto Eliminado</title>
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
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 1rem;
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
            margin-top: 1rem;
        }
        .btn-primary {
            background-color: #3498db;
            color: white;
        }
        .btn-primary:hover {
            background-color: #2980b9;
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
        <div class="alert-success">
            <h1 style="border: none; padding: 0; margin: 0 0 1rem 0; color: #155724;">Producto Eliminado Exitosamente</h1>
            <p>El producto ha sido removido del inventario de forma permanente.</p>
        </div>

        <div style="margin-top: 2rem;">
            <a href="{{ route('productos.show') }}" class="btn btn-primary">Volver a la lista de productos</a>
            <a href="{{ route('productos.index') }}" class="btn btn-secondary">Ir al inicio</a>
        </div>
    </main>
</body>
</html>
