<?php

use Illuminate\Database\Seeder;

class MasterDiagramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('master_diagrams')->delete();

        \DB::table('master_diagrams')->insert(array (
            0 =>
            array (
                'id_master_diagram' => 1,
                'bentuk_diagram' => 'Batang',
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            1 =>
            array (
                'id_master_diagram' => 2,
                'bentuk_diagram' => 'Grafik',
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
        ));
    }
}
