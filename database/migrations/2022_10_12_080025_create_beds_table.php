<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beds', function (Blueprint $table) {
            $table->id()->comment("編號");
            $table->string("bedcode",191)->nullable(false)->comment("床位代碼");
            $table->foreignId("did")->unsigned()->nullable(false)->comment("宿別");
            $table->foreign('did')->references('id')->on('dormitories')->onDelete('cascade');
            $table->string("floor",191)->nullable(False)->comment("樓層");
            $table->string("roomtype",191)->nullable(false)->comment("住房類型");
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
        Schema::dropIfExists('beds');
    }
}
