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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->char("title")->nullable(true);
            $table->float("price")->default(0);
            $table->float("reviews")->default(0);
            $table->text("images")->nullable(true);
            $table->boolean("active")->default(true);
            $table->char("date")->nullable(true);
            $table->char("location")->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
    }
};
