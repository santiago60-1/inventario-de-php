<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoriaController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Categoria::class);

        $categorias = Categoria::orderBy('nombre')->paginate(10);

        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        $this->authorize('create', Categoria::class);

        return view('categorias.create');
    }

    public function store(CategoriaRequest $request)
    {
        $this->authorize('create', Categoria::class);

        Categoria::create($request->validated());

        return redirect()
            ->route('categorias.index')
            ->with('success', 'Categoría creada exitosamente');
    }

    public function edit(Categoria $categoria)
    {
        $this->authorize('update', $categoria);

        return view('categorias.edit', compact('categoria'));
    }

    public function update(CategoriaRequest $request, Categoria $categoria)
    {
        $this->authorize('update', $categoria);

        $categoria->update($request->validated());

        return redirect()
            ->route('categorias.index')
            ->with('success', 'Categoría actualizada exitosamente');
    }

    public function destroy(Categoria $categoria)
    {
        $this->authorize('delete', $categoria);

        $categoria->delete();

        return redirect()
            ->route('categorias.index')
            ->with('success', 'Categoría eliminada exitosamente');
    }
}
