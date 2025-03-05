<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ClassUser;

class ClassUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClassUser::create([
            'name' => 'Class1',
            'description' => 'Description for User 1'
        ]);

        ClassUser::create([
            'name' => 'Class2',
            'description' => 'Description for User 2'
        ]);

        ClassUser::create([
            'name' => 'Class3',
            'description' => 'Description for User 3'
        ]);

        ClassUser::create([
            'name' => 'Class4',
            'description' => 'Description for User 4'
        ]);

        ClassUser::create([
            'name' => 'Class5',
            'description' => 'Description for User 5'
        ]);
    
    }
}
