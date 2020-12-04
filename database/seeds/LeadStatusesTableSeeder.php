<?php

use Illuminate\Database\Seeder;

class LeadStatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('lead_statuses')->delete();
        
        \DB::table('lead_statuses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'dsfgdsg',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}