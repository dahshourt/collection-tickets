<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketTransferHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_transfer_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id');
			$table->foreignId('previous_group');
			$table->foreignId('current_group');
			$table->foreignId('pervious_status');
			$table->foreignId('current_status');
			$table->foreignId('user_id');
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('previous_group')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('current_group')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('pervious_status')->references('id')->on('statuses')->onDelete('cascade');
            $table->foreign('current_status')->references('id')->on('statuses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_transfer_history');
    }
}
