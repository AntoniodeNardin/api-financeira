<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meta;
use App\Http\Requests\MetaRequest;

class MetaController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(
            Meta::where('user_id', $request->user()->id)->get()
        );
    }

    public function store(MetaRequest $request)
    {
        $meta = Meta::create([
            'user_id' => $request->user()->id,
            ...$request->validated()
        ]);

        return response()->json($meta, 201);
    }

    public function show(Meta $meta)
    {
        $this->authorize('view', $meta);
        return response()->json($meta);
    }

    public function update(MetaRequest $request, Meta $meta)
    {
        $this->authorize('update', $meta);
        $meta->update($request->validated());
        return response()->json($meta);
    }

    public function destroy(Meta $meta)
    {
        $this->authorize('delete', $meta);
        $meta->delete();
        return response()->json(['message' => 'Meta excluída com sucesso']);
    }
}
