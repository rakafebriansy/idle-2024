<?php

use Illuminate\Database\Seeder;

class OrmawasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ormawas = ['Himasif', 'Himatif', 'Laos'];
        foreach($ormawas as $ormawa){
            DB::table('ormawas')->insert([
                'nama_ormawa' => $ormawa
            ]);
        }
    }
}
