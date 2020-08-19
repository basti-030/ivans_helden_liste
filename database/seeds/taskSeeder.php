<?php

use Illuminate\Database\Seeder;

class taskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task')->insert([
            'task' => Str::random(10),
            'deadline' => Str::random(10),
            'estHour' => Str::random(10),
            'totalHour' => Str::random(10),
            'developer' => Str::random(10),
            'tester' => Str::random(10),
            'progress' => Str::random(10),
            'EnDate' => Str::random(10),
            'pId' => Str::random(10),
            'pIdNr' => Str::random(10),
            'KvaId' => Str::random(10),

        ]);
    }
}
