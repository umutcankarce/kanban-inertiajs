<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\CardList;
use Illuminate\Http\Request;

class CardListController extends Controller
{

    public function store(Board $board)
    {
        request()->validate([
            "name" => "required"
        ]);

        CardList::create([
            "user_id"  => auth()->id(),
            "board_id" => $board->id,
            "name"     => request()->input("name")
        ]);

        return redirect()->back();
    }



}
