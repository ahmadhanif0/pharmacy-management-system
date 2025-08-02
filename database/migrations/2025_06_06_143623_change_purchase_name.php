<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePurchaseName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchases', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchases', function (Blueprint $table) {
            // Drop the unique index if it exists
            if (Schema::hasColumn('purchases', 'name')) {
                // $table->dropUnique(['name']);
            }

            // Drop softDeletes if it exists
            if (Schema::hasColumn('purchases', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });
    }
}
