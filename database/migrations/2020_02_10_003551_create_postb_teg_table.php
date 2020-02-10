<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostbTegTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postb_teg', function (Blueprint $table) {
            $table->unsignedInteger('postb_id');
            $table->unsignedInteger('teg_id');
            $table->foreign('postb_id')->references('id')->on('postbs');
            $table->foreign('teg_id')->references('id')->on('tegs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postb_teg');
    }
}
