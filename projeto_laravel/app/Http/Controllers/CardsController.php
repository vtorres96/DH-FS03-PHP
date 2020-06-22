<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function index() {

        $cards = [
            "Card 1", "Card 2", "Card 3", "Card 4",
            "Card 5", "Card 6", "Card 7", "Card 8"
        ];

        $cardPrices = [
            "10,90", "10,90", "10,90", "10,90",
            "10,90", "10,90", "10,90", "10,90"
        ];

        $cardTitles = [
            "Title 1", "Title 2", "Title 3", "Title 4",
            "Title 5", "Title 6", "Title 7", "Title 8"
        ];

        return view('welcome')->with([
            'cards' => $cards,
            'cardPrices' => $cardPrices,
            'cardTitles' => $cardTitles
        ]);
    }
}
