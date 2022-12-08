<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\ViewServiceProvider;

class SeriesController extends Controller
{
    public function index(Request $request)
    {

        $series = [
            'Suits',
            'The Mentalist',
            'Grey\'s Anatomy'
        ];

        // Alternative view()
        /* return view('listar-series', [
            'series' => $series
        ]); */

        // Alternative view()
        // return view('listar-series', compact('series'));

        return view('listar-series')->with('series', $series);
    }
}
