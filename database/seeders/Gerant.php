<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Gerant extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('GerantFermes')->insert([
            'nomG'=>"Apartement",
            'prenomG'=>"zzdd  vv f cd vfg cfg ",
            'telephone'=>'666666666666',
            'cin'=>'CD23156',
            'email'=>"houda@gmail.com"
        ]);
    }
}
