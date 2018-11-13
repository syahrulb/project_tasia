<?php

use Illuminate\Database\Seeder;

class AkunsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('akuns')->delete();

        \DB::table('akuns')->insert(array (
            0 =>
            array (
                'id_akun' => 101,
                'nama_akun' => 'Kas',
                'saldo_akun' => 150000000,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            1 =>
            array (
                'id_akun' => 102,
                'nama_akun' => 'Rekening Bank ABC',
                'saldo_akun' => 100000000,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            2 =>
            array (
                'id_akun' => 103,
                'nama_akun' => 'Piutang',
                'saldo_akun' => 0,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            3 =>
            array (
                'id_akun' => 104,
                'nama_akun' => 'Perlengkapan Habis Pakai',
                'saldo_akun' => 10000000,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            4 =>
            array (
                'id_akun' => 105,
                'nama_akun' => 'Tanah Dan Bangunan',
                'saldo_akun' => 5000000,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            5 =>
            array (
                'id_akun' => 106,
                'nama_akun' => 'Kendaraan',
                'saldo_akun' => 0,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            6 =>
            array (
                'id_akun' => 107,
                'nama_akun' => 'Akumulasi Penyusutan Kendaraan',
                'saldo_akun' => 0,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            7 =>
            array (
                'id_akun' => 108,
                'nama_akun' => 'Asuransi Dibayar Dimuka',
                'saldo_akun' => 10000000,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            8 =>
            array (
                'id_akun' => 109,
                'nama_akun' => 'Sewa Dibayar Dimuka',
                'saldo_akun' => 75000000,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            9 =>
            array (
                'id_akun' => 201,
                'nama_akun' => 'Hutang Usaha',
                'saldo_akun' => 150000000,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            10 =>
            array (
                'id_akun' => 202,
                'nama_akun' => 'Hutang Pada Bank XYZ',
                'saldo_akun' => 250000000,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            11 =>
            array (
                'id_akun' => 203,
                'nama_akun' => 'Sewa Diterima Dimuka',
                'saldo_akun' => 50000000,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            12 =>
            array (
                'id_akun' => 204,
                'nama_akun' => 'Hutang Gaji',
                'saldo_akun' => 0,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            13 =>
            array (
                'id_akun' => 301,
                'nama_akun' => 'Modal Usaha',
                'saldo_akun' => 400000000,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            14 =>
            array (
                'id_akun' => 302,
                'nama_akun' => 'Prive',
                'saldo_akun' => 0,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            15 =>
            array (
                'id_akun' => 401,
                'nama_akun' => 'Pendapatan Sewa Ruang',
                'saldo_akun' => 0,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            16 =>
            array (
                'id_akun' => 402,
                'nama_akun' => 'Pendapatan Sewa Gudang',
                'saldo_akun' => 0,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            17 =>
            array (
                'id_akun' => 403,
                'nama_akun' => 'Pendapatan Bunga',
                'saldo_akun' => 0,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            18 =>
            array (
                'id_akun' => 501,
                'nama_akun' => 'Biaya Sewa',
                'saldo_akun' => 0,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            19 =>
            array (
                'id_akun' => 502,
                'nama_akun' => 'Biaya Gaji',
                'saldo_akun' => 0,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            20 =>
            array (
                'id_akun' => 503,
                'nama_akun' => 'Biaya Perlengkapan Habis Pakai',
                'saldo_akun' => 0,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            21 =>
            array (
                'id_akun' => 504,
                'nama_akun' => 'Biaya Utiliti',
                'saldo_akun' => 0,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            22 =>
            array (
                'id_akun' => 505,
                'nama_akun' => 'Biaya Transportasi',
                'saldo_akun' => 0,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            23 =>
            array (
                'id_akun' => 506,
                'nama_akun' => 'Biaya Penyusutan Kendaraan',
                'saldo_akun' => 0,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            24 =>
            array (
                'id_akun' => 507,
                'nama_akun' => 'Biaya Penyusutan Kendaraan',
                'saldo_akun' => 0,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            25 =>
            array (
                'id_akun' => 508,
                'nama_akun' => 'Biaya Asuransi',
                'saldo_akun' => 0,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
            26 =>
            array (
                'id_akun' => 509,
                'nama_akun' => 'Biaya Lain Lain',
                'saldo_akun' => 0,
                'created_at' => '2018-11-11 22:00:00',
                'updated_at' => '2018-11-11 22:00:00',
            ),
        ));
    }
}
