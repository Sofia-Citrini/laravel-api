<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['JavaScript', 'VUE', 'PHP', 'Laravel'];

        foreach ($technologies as $tech) {
            Technology::create([
                'name' => $tech
            ]);
        }
    }
}
