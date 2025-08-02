<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeReturnRequestIdNullableInProductExchanges extends Migration
{
    public function up()
    {
        Schema::table('product_exchanges', function (Blueprint $table) {
            $table->unsignedBigInteger('return_request_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('product_exchanges', function (Blueprint $table) {
            $table->unsignedBigInteger('return_request_id')->nullable(false)->change();
        });
    }
}
