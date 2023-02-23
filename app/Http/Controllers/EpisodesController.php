<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Series;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodesController extends Controller
{
    public function index(Season $season)
    {
        return view('episodes.index', [
            'episodes' => $season->episodes,
            'mensagemSucesso' => session('mensagem.sucesso')
        ]);
    }

    public function update(Request $request, Season $season)
    {
        $watchedEpisodes = $request->episodes;

        DB::transaction(function () use ($watchedEpisodes) {
            DB::table('episodes')->whereIn('id', $watchedEpisodes)->update(['watched' => true]);
            DB::table('episodes')->whereNotIn('id', $watchedEpisodes)->update(['watched' => false]);
        });

        return to_route('episodes.index', $season->id)->with('mensagem.sucesso', 'Episódios marcados como assistidos');
    }
}
