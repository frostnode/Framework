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
            $table->integer('status'); // 1 = Draft, 2 = Published
            $table->integer('revision_id');
            $table->integer('lang_id'); // 1 = English default

            // Relationships
            $table->integer('type_id');
            $table->integer('user_id');

            // Dates
            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index([
                'lang_id',
                'revision_id',
                'type_id',
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
