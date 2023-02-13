<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Foreach_;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [ 
                'name' => 'html - css',
                'description' => 'progetto HTML e CSS'
            ],
            [ 
                'name' => 'Javascript',
                'description' => 'progetto javascript'
            ],
            [ 
                'name' => 'VUE',
                'description' => 'progetto vue'
            ],
            [ 
                'name' => 'Laravel',
                'description' => 'progetto laravel'
            ]
        ];

        foreach($types as $type){
            $newType = new Type();
            $newType->name = $type['name'];
            $newType->description = $type['description'];

            $newType->save();
        }
    }
}
