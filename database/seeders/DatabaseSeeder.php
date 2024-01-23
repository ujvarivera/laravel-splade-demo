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
            ['name' => 'office worker'],
            ['name' => 'factory worker']
        ]);

        \App\Models\User::factory()->create([
            'name' => 'office worker',
            'username' => 'testuser1',
            'card_number' => '543-232-142',
            'email' => 'test@demo.com',
            'role_id' => 1
        ]);

        \App\Models\User::factory()->create([
            'name' => 'factory worker',
            'username' => 'testuser2',
            'card_number' => '666-555-444',
            'email' => 'test@demo2.com',
            'role_id' => 2
        ]);

        \App\Models\Customer::factory(100)->create();
        
        DB::table('work_types')->insert([
            ['name' => 'cutting'],
            ['name' => 'painting']
        ]);
    }
}
