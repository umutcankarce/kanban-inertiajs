<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\CardList;
use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index()
    {
        return Inertia::render('Boards/Index',[
            "boards" => auth()->user()->boards
        ]);
    }

    public function show(Board $board)
    {
        $board->load([
            'lists.cards' => fn($query) => $query->orderBy('position')
        ]);

        return Inertia::render('Boards/Show',[
            'board' => $board
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required"
        ]);

        Board::create([
            'user_id' => auth()->user()->id,
            'name' => $request->input('name')
        ]);

        return redirect()->back();
    }

    public function update(Board $board)
    {
        request()->validate([
            'name' => 'required|max:255',
        ]);

        $board->update(['name' => request()->input('name')]);

        return redirect()->back();
    }


}
