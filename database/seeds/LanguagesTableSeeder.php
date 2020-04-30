<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('languages')->delete();

        \DB::table('languages')->insert(
            [
                0 =>
                    [
                        'id' => 1,
                        'code' => 'en',
                        'title' => 'English',
                        'is_default' => false,
                        'created_at' => '2019-03-29 11:35:18',
                        'updated_at' => null,
                        'icon' => 'ocpx-icon-english',
                        'is_available_on_mobile' => true,
                        'deleted_at' => null,
                    ],
                1 =>
                    [
                        'id' => 2,
                        'code' => 'ru',
                        'title' => 'Russian',
                        'is_default' => true,
                        'created_at' => '2019-03-29 11:35:18',
                        'updated_at' => null,
                        'icon' => 'ocpx-icon-russia',
                        'is_available_on_mobile' => true,
                        'deleted_at' => null,
                    ],
            ]
        );
    }
}
