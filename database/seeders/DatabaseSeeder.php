<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        
        DB::table('roles')->insert([
            ['name' => 'irodai dolgozó'],
            ['name' => 'gyári dolgozó']
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'username' => 'testuser1',
            'card_number' => '543-232-142',
            'email' => 'test@demo.com',
            'role_id' => 1
        ]);


    }
}
