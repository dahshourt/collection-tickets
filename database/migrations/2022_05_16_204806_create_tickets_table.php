<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('account');
            $table->foreignId('creator_id');
            $table->foreignId('user_action_id');
            $table->foreignId('status_id');//current status
            $table->foreignId('group_id');//current group

            $table->foreignId('category_id');
            $table->foreignId('customer_type_id');
            $table->foreignId('market_segment_id');
            $table->foreignId('transaction_type_id');
            $table->foreignId('receiver_bank_id');
            $table->timestamp('bank_transaction_date')->nullable();
            $table->float('transaction_amount')->nullable();

            $table->text('description')->nullable();
            $table->string('cheque_number')->nullable();
            $table->enum('multiple_settlement', ['0', '1'])->default(0);
            $table->enum('add_on_oracle', ['0', '1'])->default(0);

            $table->timestamp('add_on_oracle_date')->nullable();

            $table->foreignId('rejection_reason_id')->nullable();
            $table->string('rejection_reason_comment')->nullable();

            $table->foreignId('previous_user_id')->nullable();
            $table->foreignId('previous_status_id')->nullable();
            $table->foreignId('previous_group_id')->nullable();


            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('customer_type_id')->references('id')->on('customer_types')->onDelete('cascade');
            $table->foreign('market_segment_id')->references('id')->on('market_segments')->onDelete('cascade');
            $table->foreign('transaction_type_id')->references('id')->on('transaction_types')->onDelete('cascade');
            $table->foreign('receiver_bank_id')->references('id')->on('receiver_banks')->onDelete('cascade');
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_action_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');


            $table->foreign('previous_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('previous_status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->foreign('previous_group_id')->references('id')->on('groups')->onDelete('cascade');

            $table->foreign('rejection_reason_id')->references('id')->on('rejection_reasons')->onDelete('cascade');


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
        Schema::dropIfExists('tickets');
    }
}
