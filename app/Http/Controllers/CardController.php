<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function store()
    {
        request()->validate([
            "board_id" => ["required","exists:boards,id"],
            "card_list_id" => ["required","exists:card_lists,id"],
            "title" => ["required"],
        ]);

        Card::create([
            "board_id" => request()->input("board_id"),
            "card_list_id" => request()->input("card_list_id"),
            "title" => request()->input("title"),
            "user_id" => auth()->id()
        ]);

        return redirect()->back();
    }
}
