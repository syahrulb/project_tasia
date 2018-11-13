<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MasterDiagramsTableSeeder::class);
        $this->call(JenisRasiosTableSeeder::class);
        $this->call(RasiosTableSeeder::class);
        $this->call(PengelompokansTableSeeder::class);
        $this->call(AkunsTableSeeder::class);
        
    }
}
