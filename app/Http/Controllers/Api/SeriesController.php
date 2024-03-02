<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Routing\Controller;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository) {}

    public function index() {
        return Series::all();
    }

    public function store(SeriesFormRequest $request) {
        return response()
            ->json($this->seriesRepository->add($request), 201);
    }

    public function show(Series $series) {
        return $series;
    }

    // Obter uma série com suas temporadas e episódios
    /* public function show(int $series) {
        // Utilizando Eager Loading
        return Series::whereId($series)
            ->with('seasons.episodes')
            ->first();
    } */
}