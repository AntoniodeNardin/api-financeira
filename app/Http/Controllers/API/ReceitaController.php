<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReceitaRequest;
use App\Http\Resources\ReceitaResource;
use App\Models\Receita;
use Illuminate\Http\Request;

class ReceitaController extends Controller
{
    public function index(Request $request)
    {
        $query = Receita::where('user_id', $request->user()->id);

        return ReceitaResource::collection($query->latest()->get());
    }

    public function store(ReceitaRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;

        $receita = Receita::create($data);

        return new ReceitaResource($receita);
    }

    public function show(Receita $receita)
    {
        $this->authorize('view', $receita);
        return new ReceitaResource($receita);
    }

    public function update(ReceitaRequest $request, Receita $receita)
    {
        $this->authorize('update', $receita);
        $receita->update($request->validated());

        return new ReceitaResource($receita);
    }

    public function destroy(Receita $receita)
    {
        $this->authorize('delete', $receita);
        $receita->delete();

        return response()->json(['message' => 'Receita excluída com sucesso']);
    }
}
