<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\BlogEntry;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->hasBlogEntries(0)->create([
            'role' => 'visitor']);
        User::factory(3)->hasBlogEntries(3)->create([
            'role' => 'writer']);
        User::factory(1)->hasBlogEntries(5)->create([
            'name' => 'Lester',
            'email' => 'lester@mail.com',
            'role' => 'admin']);
    }
}
