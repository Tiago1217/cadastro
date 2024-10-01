<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    // Lista todos os filmes
    public function index()
    {
        $filmes = Filme::all();
        return response()->json($filmes);
    }

    // Mostra um filme específico
    public function show($id)
    {
        $filme = Filme::find($id);

        if (!$filme) {
            return response()->json(['message' => 'Filme não encontrado'], 404);
        }

        return response()->json($filme);
    }

    // Armazena um novo filme
    public function store(Request $request)
    {
        $request->validate([
            'genero' => 'required|string|max:255',
            'ano' => 'required|integer',
            'duracao' => 'required|integer',
            'titulo' => 'required|string|max:255',
            'diretor' => 'required|string|max:255',
        ]);

        $filme = Filme::create($request->all());
        return response()->json($filme, 201);
    }

    // Atualiza um filme existente
    public function update(Request $request, $id)
    {
        $filme = Filme::find($id);

        if (!$filme) {
            return response()->json(['message' => 'Filme não encontrado'], 404);
        }

        $request->validate([
            'genero' => 'string|max:255',
            'ano' => 'integer',
            'duracao' => 'integer',
            'titulo' => 'string|max:255',
            'diretor' => 'string|max:255',
        ]);

        $filme->update($request->all());
        return response()->json($filme);
    }

    // Remove um filme
    public function destroy($id)
    {
        $filme = Filme::find($id);

        if (!$filme) {
            return response()->json(['message' => 'Filme não encontrado'], 404);
        }

        $filme->delete();
        return response()->json(['message' => 'Filme removido com sucesso']);
    }
}
