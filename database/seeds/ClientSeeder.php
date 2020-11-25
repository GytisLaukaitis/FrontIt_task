<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            [
                'name' => 'Gytis',
                'surname' => 'Laukaitis',
                'yearOfBirth' => '1988-12-05'
            ],
            [
                'name' => 'Vincentas',
                'surname' => 'Jankauskas',
                'yearOfBirth' => '1978-10-21'
            ],
            [
                'name' => 'Eligijus',
                'surname' => 'Kateiva',
                'yearOfBirth' => '1962-07-25'
            ],
            [
                'name' => 'Liu',
                'surname' => 'E veliz',
                'yearOfBirth' => '2000-04-05'
            ],

        ]);
    }
}
