<?php

use Illuminate\Database\Seeder;

class DogsTableSeede extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Dogs::class, 10)->create();
    }
}
