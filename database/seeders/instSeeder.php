<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class instSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $insts=['JKUAT','KU','MKU','UoN','CUK','MMU','TANGAZA'];
        foreach($insts as $inst){
            DB::table('institutions')->insert([
                'institution'=>$inst
            ]);
        }
        
    }
}
