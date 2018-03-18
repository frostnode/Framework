<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_type', function (Blueprint $table) {
            $table->increments('id');

            // Data
            $table->string('name');
            $table->string('machine_name');
            $table->text('description')->nullable;
            $table->string('group')->nullable();
            $table->json('content');
            $table->string('model');

            // Dates
            $table->timestamps();

            // Indexes
            $table->index([
                'machine_name'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_type');
    }
}
