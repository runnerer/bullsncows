<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GameHistory;

class RankingController extends Controller
{
    public function index() {
        $results = GameHistory::orderBy('guesses')->take(10)->get();
            
        return view('ranking', [
            'results' => $results
        ]);
    }
}
