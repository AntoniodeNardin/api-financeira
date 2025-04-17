<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DespesaRequest;
use App\Http\Resources\DespesaResource;
use App\Models\Despesa;
use Illuminate\Http\Request;

class DespesaController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $query = Despesa::with('categoria')->where('user_id', $user->id);

        return DespesaResource::collection($query->latest()->get());
    }

    public function store(DespesaRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;

        $despesa = Despesa::create($data);

        return new DespesaResource($despesa);
    }

    public function show(Despesa $despesa)
    {
        $this->authorize('view', $despesa);
        $despesa->load('categoria');
        return new DespesaResource($despesa);
    }

    public function update(Request $request, Despesa $despesa)
    {
        $this->authorize('update', $despesa);
        $despesa->update($request->all());

        return new DespesaResource($despesa);
    }

    public function destroy(Despesa $despesa)
    {
        $this->authorize('delete', $despesa);
        $despesa->delete();

        return response()->json(['message' => 'Despesa excluída com sucesso']);
    }
}
