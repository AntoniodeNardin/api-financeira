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

        $query = Despesa::where('user_id', $user->id);

        if ($request->filled('categoria')) {
            $query->where('categoria', $request->categoria);
        }

        if ($request->filled('de')) {
            $query->whereDate('data', '>=', $request->de);
        }

        if ($request->filled('ate')) {
            $query->whereDate('data', '<=', $request->ate);
        }

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
        $this->authorizeUser($despesa);
        return new DespesaResource($despesa);
    }

    public function update(DespesaRequest $request, Despesa $despesa)
    {
        $this->authorizeUser($despesa);
        $despesa->update($request->validated());
        return new DespesaResource($despesa);
    }

    public function destroy(Despesa $despesa)
    {
        $this->authorizeUser($despesa);
        $despesa->delete();
        return response()->json(['message' => 'Despesa excluída com sucesso']);
    }

    private function authorizeUser(Despesa $despesa)
    {
        if (auth()->id() !== $despesa->user_id) {
            abort(403, 'Acesso não autorizado');
        }
    }
}
