<?php

use Illuminate\Database\Seeder;

class PengelompokansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('pengelompokans')->delete();

        \DB::table('pengelompokans')->insert(array (
            0 =>
            array (
                'id_kelompok' => 1,
                'kegunaan_akun' => 'Aktiva',
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            1 =>
            array (
                'id_kelompok' => 2,
                'kegunaan_akun' => 'Aktiva Tetap',
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            2 =>
            array (
                'id_kelompok' => 3,
                'kegunaan_akun' => 'Aktiva Operasi',
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            3 =>
            array (
                'id_kelompok' => 4,
                'kegunaan_akun' => 'Modal Sendiri',
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            4 =>
            array (
                'id_kelompok' => 5,
                'kegunaan_akun' => 'Hutang Jangka Panjang',
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            5 =>
            array (
                'id_kelompok' => 6,
                'kegunaan_akun' => 'Hutang',
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            6 =>
            array (
                'id_kelompok' => 7,
                'kegunaan_akun' => 'Laba Usaha',
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            7 =>
            array (
                'id_kelompok' => 8,
                'kegunaan_akun' => 'Aktiva Usaha',
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            8 =>
            array (
                'id_kelompok' => 9,
                'kegunaan_akun' => 'Laba Kotor',
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            9 =>
            array (
                'id_kelompok' => 10,
                'kegunaan_akun' => 'Penjualan',
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            10 =>
            array (
                'id_kelompok' => 11,
                'kegunaan_akun' => 'Laba Bersih',
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            11 =>
            array (
                'id_kelompok' => 12,
                'kegunaan_akun' => 'HPP',
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            12 =>
            array (
                'id_kelompok' => 13,
                'kegunaan_akun' => 'Biaya Operasi',
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            13 =>
            array (
                'id_kelompok' => 14,
                'kegunaan_akun' => 'Laba Bersih',
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
        ));
    }
}
