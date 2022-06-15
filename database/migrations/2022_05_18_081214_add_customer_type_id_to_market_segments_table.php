<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomerTypeIdToMarketSegmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('market_segments', function (Blueprint $table) {
            //
            $table->foreignId('customer_type_id');
            $table->foreign('customer_type_id')->references('id')->on('customer_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('market_segments', function (Blueprint $table) {
            //
            $table->dropForeign('market_segments_customer_type_id_foreign');
            $table->dropColumn('customer_type_id');
        });
    }
}
