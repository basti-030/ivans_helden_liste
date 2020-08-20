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
        for($i=0;$i <10;$i++)
        {
            DB::table('project_tasks')->insert([
                'task' => Str::random(10),
                'deadline' => '2020-08-29',
                'shortDescription' => Str::random(10),
                'estHour' => Str::random(10),
                'totalHour' => Str::random(10),
                'developer' => Str::random(10),
                'tester' => Str::random(10),
                'status' => Str::random(10),
                'progress' => Str::random(10),
                'EnDate' => '2020-09-30',
                'pId' => Str::random(10),
                'pIdNr' => Str::random(10),
                'KvaId' => Str::random(10),

            ]);
        }
    }
}
?>
