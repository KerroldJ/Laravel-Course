<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the first user (or create one if needed)
        $user = User::first() ?? User::factory()->create();

        Note::create([
            'title' => 'Welcome Note',
            'text' => 'This is a note linked to a user.',
            'user_id' => $user->id,
        ]);

        Note::create([
            'title' => 'Another Note',
            'text' => 'All notes should be linked to a user now.',
            'user_id' => $user->id,
        ]);
    }
}
