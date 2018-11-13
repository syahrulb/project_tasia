<?php

use Illuminate\Database\Seeder;

class JenisRasiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('jenis_rasios')->delete();

        \DB::table('jenis_rasios')->insert(array (
            0 =>
            array (
                'id_jenis_rasio' => 1,
                'jenis_rasio' => 'Rasio Solvabilitas',
                'master_diagram' =>2,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            1 =>
            array (
                'id_jenis_rasio' => 2,
                'jenis_rasio' => 'Rasio Profitabilitas',
                'master_diagram' =>1,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
        ));
    }
}
