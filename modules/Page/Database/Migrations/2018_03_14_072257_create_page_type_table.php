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
            $table->text('description')->nullable;
            $table->string('model');
            $table->json('fields')->nullable();
            $table->string('group')->nullable();

            // Dates
            $table->timestamps();

            // Indexes
            $table->index([
                'model'
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
