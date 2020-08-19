<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedPurchaseStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data = array(
            array('purchase_status' => 'On delivery'),
            array('purchase_status' => 'Delivery Hub - Truck Delivery'),
            array('purchase_status' => 'On Process - Seller Shipping Product')
        );

        DB::table('purchase_status')->insert($data);
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
