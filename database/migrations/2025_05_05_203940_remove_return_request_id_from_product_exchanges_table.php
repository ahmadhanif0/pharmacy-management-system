<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveReturnRequestIdFromProductExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_exchanges', function (Blueprint $table) {
            $table->dropForeign(['return_request_id']);
            $table->dropColumn('return_request_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_exchanges', function (Blueprint $table) {
            //
        });
    }
}
