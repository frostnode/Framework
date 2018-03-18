<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageRevisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_revision', function (Blueprint $table) {
            $table->increments('id');

            // Data
            $table->json('content')->nullable();
            $table->integer('lang_id');
            $table->integer('type_id');

            // Relationships
            $table->integer('page_id');
            $table->integer('user_id');

            // Dates
            $table->timestamps();

            // Indexes
            $table->index([
                'lang_id',
                'page_id'
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
        Schema::dropIfExists('page_revision');
    }
}
