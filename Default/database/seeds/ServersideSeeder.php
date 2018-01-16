<?php

use Illuminate\Database\Seeder;

class ServersideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Serverside::class, 2000)->create();
    }
}
