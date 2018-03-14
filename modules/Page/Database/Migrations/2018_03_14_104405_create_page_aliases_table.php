<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageAliasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_aliases', function (Blueprint $table) {
            $table->increments('id');

            // Data
            $table->string('slug');
            $table->integer('lang_id');
            $table->integer('page_id');
            $table->integer('type'); // 1 = Alias, 2 = Redirect
            $table->integer('response')->nullable(); // Example http response 302

            // Dates
            $table->timestampsTz();

            // Indexes
            $table->index([
                'slug',
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
        Schema::dropIfExists('page_aliases');
    }
}
