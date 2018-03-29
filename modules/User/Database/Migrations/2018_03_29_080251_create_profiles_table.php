<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');

            // Data
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('picture')->nullable();
            $table->string('gender')->nullable();
            $table->string('birthday')->nullable();
            $table->string('provider_user_id')->nullable();
            $table->string('provider')->nullable();

            // Relationships
            $table->integer('user_id');
            $table->softDeletes();

            // Dates
            $table->timestamps();

            // Indexes
            $table->index([
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
        Schema::dropIfExists('profiles');
    }
}
