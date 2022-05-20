<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10;$i++){
            Post::create([
                'post_name' => 'Health is wealth',
                'detail' => ' ‘Health is wealth‘ means that one’s health is the greatest wealth. The definition of health is a state of a person’s physical, mental, emotional, and social well-being. A healthy body resides in God. Every person must maintain good health. It makes them feel good and positive',
                'user_id' => '1',
                'category_id' => '1',
                ]);
        }
    }
}
