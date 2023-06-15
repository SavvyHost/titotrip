<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char("username", 255)->nullable(true);
            $table->char("email", 255)->nullable(true);
            $table->char("phone", 255)->nullable(true);
            $table->char("password", 255)->nullable(true);
            $table->char("register_ip", 255)->nullable(true);
            $table->char("register_device", 255)->nullable(true);
            $table->char("register_date", 255)->nullable(true);
            $table->char("login_ip", 255)->nullable(true);
            $table->char("login_device", 255)->nullable(true);
            $table->char("login_date", 255)->nullable(true);
            $table->char("language", 255)->nullable(true);
            $table->char("country", 255)->nullable(true);
            $table->char("gender", 255)->nullable(true);
            $table->text("image")->nullable(true);
            $table->boolean("active")->default(1);
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
};
