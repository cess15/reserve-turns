<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\Student;
use App\Models\Turn;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SemesterSeeder::class);
        Career::create([
            'name' => 'sistemas'
        ]);
        Career::factory(9)->create();
        Student::factory(50)->create();
        Turn::factory(20)->create();
        // \App\Models\User::factory(10)->create();
    }
}
