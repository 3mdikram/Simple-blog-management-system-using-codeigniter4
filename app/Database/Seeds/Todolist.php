<?php

namespace App\Database\Seeds;

use App\Models\Tdolist;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Todolist extends Seeder
{
    public function run()
    {
        $slary=new Tdolist();
        $faker= \Faker\Factory::create();
        for($i=0;$i<10; $i++){
            $slary->save(
                [
                    'name'        =>    $faker->firstName,
                    'item'       =>    $faker->jobTitle,
                    'issue_by'       =>    $faker->name,
                    'created_at'  =>    $faker->date(),
                ]
            );
        }
    }
}
