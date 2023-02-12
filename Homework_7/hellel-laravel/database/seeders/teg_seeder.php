<?php

namespace Database\Seeders;

use App\Models\Teg;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class teg_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= config('const.countTeg'); $i++) {
            $teg = new Teg();
            $teg->name = "teg_$i";
            $teg->save();
        }
    }
}
