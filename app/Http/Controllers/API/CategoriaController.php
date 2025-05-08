<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaStoreRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Resources\CategoriaResource;

class CategoriaController extends Controller

{
    public function index(Request $request)
    {
        return CategoriaResource::collection(Categoria::where('user_id', $request->user()->id)->get());
    }

    public function store(CategoriaStoreRequest $request)
    {
        $categoria = Categoria::create([
            'user_id' => $request->user()->id,
            'nome' => $request->validated()['nome'],
        ]);

        return new CategoriaResource($categoria);
    }

    public function show(Categoria $categoria)
    {
        $this->authorize('view', $categoria);
        return new CategoriaResource($categoria);
    }

    public function update(CategoriaStoreRequest $request, Categoria $categoria)
    {
        $this->authorize('update', $categoria);

        $categoria->update($request->all());

        return new CategoriaResource($categoria);
    }
}
