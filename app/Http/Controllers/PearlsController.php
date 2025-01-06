<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class PearlsController extends Controller
{
    public function index(Request $request)
    {
        $pearls = [
            'A' => [
                ['title' => 'Acceptance', 'description' => 'Acceptance is the key to peace.'],
                ['title' => 'Aim', 'description' => 'Always aim for the higher good.'],
            ],
            'B' => [
                ['title' => 'Boldness', 'description' => 'Be bold and courageous.'],
                ['title' => 'Belief', 'description' => 'Believe in the power of prayer.'],
            ],
            'C' => [
                ['title' => 'Compassion', 'description' => 'Compassion is the essence of life.'],
                ['title' => 'Character', 'description' => 'Character defines a person.'],
            ],
        ];
        $selectedAlphabet = $request->query('alphabet', 'A');
        $quotes = $pearls[$selectedAlphabet] ?? [];
        return view('pearls.index', compact('pearls', 'selectedAlphabet', 'quotes'));
    }
}
