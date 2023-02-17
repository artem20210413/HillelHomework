<?php

namespace Database\Seeders;


use App\Models\Categor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class category_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {

        for ($i = 1; $i <= config('const.countCategories'); $i++) {
            $category = new Categor();
            $category->name = "category_$i";
            $category->save();
        }
    }
}
