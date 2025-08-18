<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CoursesTableSeeder extends Seeder
{
    public function run()
    {
        $now = now();
        $courses = [
            ['name' => 'HTML AND CSS', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'JAVASCRIPT', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PYTHON', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'DATASCIENCE', 'created_at' => $now, 'updated_at' => $now],
        ];
        DB::table('courses')->insert($courses);
    }
}
