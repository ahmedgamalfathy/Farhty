<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Competition;
use Illuminate\Database\Seeder;
use Database\Seeders\ContactsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    foreach (Competition::all() as $key => $comp) {
        $comp->update([
        "prizes"=>json_encode(['iphone ','1000-SAR','pc'])
        ]);
    }
    $this->call([
        PackageSeeder::class,
        ContactsSeeder::class,
        QuestionSeeder::class
    ]);
        // User::factory(10)->create();

        // Admin::factory()->create([
        //     "name"=>'admin',
        //     "email"=>"admins@admin.com",
        // ]);
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
