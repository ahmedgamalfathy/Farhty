<?php

namespace Database\Seeders;

use App\Models\Contacts;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contacts::factory(60)->create();
    }
}
