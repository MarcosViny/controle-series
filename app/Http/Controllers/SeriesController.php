<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\ViewServiceProvider;

class SeriesController extends Controller
{
    public function index(Request $request)
    {

        $series = Serie::query()->orderBy('nome')->get();

        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create() 
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = Serie::create($request->all());

        // $request->session()->flash('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");
        // return to_route('series.index');

        return to_route('series.index')
        ->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");
    }
    
    public function destroy(Serie $series)
    // public function destroy(Serie $series, Request $request)
    {
        $series->delete();
        
        // $request->session()->flash('mensagem.sucesso', "Série '{$series->nome}' removida com Sucesso");
        // return to_route('series.index');

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' removida com Sucesso");
    }

    public function edit(Serie $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Serie $series, Request $request)
    {
        // $series->fill($request->all());
        $series->nome = $request->nome;
        $series->save();

        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com Sucesso!");
    }
}
