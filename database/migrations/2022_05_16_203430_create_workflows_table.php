<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkflowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workflows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('previous_group');
            $table->foreignId('current_group');
            $table->foreignId('current_status');
            $table->foreignId('transfer_group');
			$table->string('transfer_status');
            $table->enum('active', ['0', '1'])->default(1);
            
			$table->foreign('previous_group')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('current_group')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('current_status')->references('id')->on('statuses')->onDelete('cascade');
			$table->foreign('transfer_group')->references('id')->on('groups')->onDelete('cascade');
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
        Schema::dropIfExists('workflows');
    }
}
