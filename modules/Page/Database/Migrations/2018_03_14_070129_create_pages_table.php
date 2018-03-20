<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();

            // Data
            $table->string('title');
            $table->string('slug')->unique();
            $table->integer('status'); // 0 = Draft, 1 = Published
            $table->json('content');

            // Relationships
            $table->string('pagetype_model');
            $table->integer('lang_id'); // 1 = English default
            $table->integer('user_id');

            // Dates
            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index([
                'lang_id',
                'pagetype_model',
                'user_id'
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
        Schema::dropIfExists('pages');
    }
}
