<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomFieldsReportGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_fields_report_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('custom_field_id');
			$table->foreignId('group_id')->nullable();
			$table->integer('report_id')->nullable();
			$table->foreignId('validation_type_id')->nullable();
            $table->string('enable')->nullable();
            $table->integer('sort')->nullable();
            $table->enum('active', ['0', '1'])->default(1);

            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('custom_field_id')->references('id')->on('custom_fields')->onDelete('cascade');
			$table->foreign('validation_type_id')->references('id')->on('validation_types')->onDelete('cascade');
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
        Schema::dropIfExists('custom_fields_report_groups');
    }
}
