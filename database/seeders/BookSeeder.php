<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\User;





class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
      

      $users=User::admins()->get();
      foreach($users as $user)
      {
        User::factory()->count(1)->create();
        Book::factory(['user_id'=>$user->id])->count(1)->create();
      }
    }
}
