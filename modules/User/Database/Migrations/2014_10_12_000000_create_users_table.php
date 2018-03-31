<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();

            // Data
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('activated')->default(0);
            $table->rememberToken();

            // Relationships
            $table->integer('profile_id')->nullable();
            $table->integer('role_id')->nullable();

            // Dates
            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index([
                'profile_id',
                'role_id'
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
        Schema::dropIfExists('users');
    }
}
