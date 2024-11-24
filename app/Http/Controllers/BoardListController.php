<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\BoardList;
use Illuminate\Http\Request;

class BoardListController extends Controller
{
   


    public function store(Board $board){
        request()->validate([
            "name" => ["required"]
        ]);

        BoardList::create([
            "user_id" => auth()->id(),
            "board_id" => $board->id,
            "name" => request()->input("name")
        ]);

        return redirect()->back();
    }



}
