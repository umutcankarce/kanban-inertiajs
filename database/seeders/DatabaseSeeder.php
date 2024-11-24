<?php

namespace Database\Seeders;

use App\Models\Card;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Board;
use App\Models\CardList;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

       $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make("secret")
        ]);

        $boards = Board::factory(10)->for($user)->create();

        foreach($boards as $board){
            $cardList = CardList::factory()->create([
                'board_id' => $board->id,
                'user_id' => $user->id,
            ]);

            Card::factory(50)->create([
                'board_id' => $board->id,
                'user_id' => $user->id,
                'card_list_id' => $cardList->id,
            ]);
        }

    }
}
