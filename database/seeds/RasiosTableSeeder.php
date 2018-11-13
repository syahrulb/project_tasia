<?php

use Illuminate\Database\Seeder;

class RasiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('rasios')->delete();

        \DB::table('rasios')->insert(array (
            0 =>
            array (
                'id_rasio' => 1,
                'nama_rasio' => 'Rasio Modal Sendiri terhadap Total Aktiva',
                'operator' => '>',
                'nilai_batas' => 2,
                'jenis_rasio' => 1,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            1 =>
            array (
                'id_jenis_rasio' => 2,
                'nama_rasio' => 'Rasio Modal Sendiri dengan Aktiva Tetap',
                'operator' => '<',
                'nilai_batas' => 2,
                'jenis_rasio' => 1,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            2 =>
            array (
                'id_jenis_rasio' => 3,
                'nama_rasio' => 'Rasio Aktiva Tetap dengan Hutang Jangka Panjang',
                'operator' => '<',
                'nilai_batas' => 2,
                'jenis_rasio' => 1,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            3 =>
            array (
                'id_jenis_rasio' => 4,
                'nama_rasio' => 'Rasio Total Hutang terhadap Total Aktiva',
                'operator' => '<',
                'nilai_batas' => 2,
                'jenis_rasio' => 1,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            4 =>
            array (
                'id_jenis_rasio' => 5,
                'nama_rasio' => 'Rasio Laba Usaha dengan Aktiva Usaha',
                'operator' => '<',
                'nilai_batas' => 2,
                'jenis_rasio' => 2,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            5 =>
            array (
                'id_jenis_rasio' => 6,
                'nama_rasio' => 'Perputaran Aktiva Usaha',
                'operator' => '<',
                'nilai_batas' => 2,
                'jenis_rasio' => 2,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            6 =>
            array (
                'id_jenis_rasio' => 7,
                'nama_rasio' => 'Rasio Laba Kotor atas Penjualan',
                'operator' => '<',
                'nilai_batas' => 2,
                'jenis_rasio' => 2,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            7 =>
            array (
                'id_jenis_rasio' => 8,
                'nama_rasio' => 'Rasio Laba Usaha atas Penjualan',
                'operator' => '<',
                'nilai_batas' => 2,
                'jenis_rasio' => 2,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            8 =>
            array (
                'id_jenis_rasio' => 9,
                'nama_rasio' => 'Rasio Laba Bersih atas Penjualan',
                'operator' => '<',
                'nilai_batas' => 2,
                'jenis_rasio' => 2,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            9 =>
            array (
                'id_jenis_rasio' => 10,
                'nama_rasio' => 'Rasio Operasi',
                'operator' => '<',
                'nilai_batas' => 2,
                'jenis_rasio' => 2,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            10 =>
            array (
                'id_jenis_rasio' => 11,
                'nama_rasio' => 'Rasio Tingkat Pengembalian Investasi',
                'operator' => '<',
                'nilai_batas' => 2,
                'jenis_rasio' => 2,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            11 =>
            array (
                'id_jenis_rasio' => 12,
                'nama_rasio' => 'Rasio Tingkat Pengembalian Aset',
                'operator' => '<',
                'nilai_batas' => 2,
                'jenis_rasio' => 2,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
        ));
    }
}
