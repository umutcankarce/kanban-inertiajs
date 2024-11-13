<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index()
    {
        return Inertia::render('Boards',[
            "boards" => auth()->user()->boards
        ]);
    }

    public function show()
    {
        return Inertia::render('Board');
    }
}
