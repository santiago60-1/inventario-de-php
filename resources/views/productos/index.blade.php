<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
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
        .btn-container {
            margin-bottom: 2rem;
        }
        a.btn {
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
            font-weight: 500;
        }
        a.btn-success {
            background-color: #27ae60;
            color: white;
        }
        a.btn-success:hover {
            background-color: #229954;
        }
        a.btn-info {
            background-color: #3498db;
            color: white;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }
        a.btn-info:hover {
            background-color: #2980b9;
        }
        a.btn-danger {
            background-color: #e74c3c;
            color: white;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }
        a.btn-danger:hover {
            background-color: #c0392b;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 1.5rem 0;
        }
        table th {
            background-color: #34495e;
            color: white;
            padding: 1rem;
            text-align: left;
        }
        table td {
            padding: 1rem;
            border-bottom: 1px solid #ecf0f1;
        }
        table tr:hover {
            background-color: #ecf0f1;
        }
        .action-buttons {
            display: flex;
            gap: 0.5rem;
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
        <h1>Lista de Productos</h1>

        <div class="btn-container">
            <a href="{{ route('productos.create') }}" class="btn btn-success">Agregar Producto</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nombre del Producto</th>
                    <th style="text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Producto 1</td>
                    <td>
                        <div class="action-buttons" style="justify-content: center;">
                            <a href="{{ route('productos.edit') }}" class="btn btn-info">Editar</a>
                            <a href="{{ route('productos.destroy', 1) }}" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Producto 2</td>
                    <td>
                        <div class="action-buttons" style="justify-content: center;">
                            <a href="{{ route('productos.edit') }}" class="btn btn-info">Editar</a>
                            <a href="{{ route('productos.destroy', 2) }}" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Producto 3</td>
                    <td>
                        <div class="action-buttons" style="justify-content: center;">
                            <a href="{{ route('productos.edit') }}" class="btn btn-info">Editar</a>
                            <a href="{{ route('productos.destroy', 3) }}" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
</body>
</html>
