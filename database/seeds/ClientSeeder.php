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
                'yearOfBirth' => '1988-12-05',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Vincentas',
                'surname' => 'Jankauskas',
                'yearOfBirth' => '1978-10-21',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
            [
                'name' => 'Eligijus',
                'surname' => 'Kateiva',
                'yearOfBirth' => '1962-07-25',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Liu',
                'surname' => 'E veliz',
                'yearOfBirth' => '2000-04-05',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

        ]);
    }
}
