<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedValidIdTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data = array(
            array('valid_id_type' => 'Philippine Passport'),
            array('valid_id_type' => 'Driver’s license'),
            array('valid_id_type' => 'SSS UMID Card'),
            array('valid_id_type' => 'PhilHealth ID'),
            array('valid_id_type' => 'TIN Card'),
            array('valid_id_type' => 'Postal ID'),
            array('valid_id_type' => 'Voter’s ID')
        );

        DB::table('valid_id_types')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
