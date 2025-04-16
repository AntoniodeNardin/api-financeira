<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Listar categorias
    public function index(Request $request)
    {
        // Exibir categorias associadas ao usuário autenticado
        $categorias = Categoria::where('user_id', $request->user()->id)->get();
        return response()->json($categorias);
    }

    // Criar nova categoria
    public function store(Request $request)
    {
        // Validar dados
        $data = $request->validate([
            'nome' => 'required|string|max:100',
        ]);

        // Criar categoria
        $categoria = Categoria::create([
            'user_id' => $request->user()->id,
            'nome' => $data['nome'],
        ]);

        return response()->json($categoria, 201);
    }

    // Exibir categoria específica

    public function show(Request $request, Categoria $categoria)
    {
        // Verificar se a categoria pertence ao usuário
        if ($categoria->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Acesso não autorizado'], 403);
        }

        return response()->json($categoria);
    }

    // Atualizar categoria
    public function update(Request $request, Categoria $categoria)
    {
        // Verificar se a categoria pertence ao usuário
        if ($categoria->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Acesso não autorizado'], 403);
        }

        // Validar dados
        $data = $request->validate([
            'nome' => 'required|string|max:100',
        ]);

        // Atualizar categoria
        $categoria->update([
            'nome' => $data['nome'],
        ]);

        return response()->json($categoria);
    }

    // Excluir categoria
    public function destroy(Categoria $categoria, Request $request)
    {
        // Verificar se a categoria pertence ao usuário
        if ($categoria->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Acesso não autorizado'], 403);
        }

        // Deletar categoria
        $categoria->delete();
        return response()->json(['message' => 'Categoria excluída com sucesso']);
    }
}
