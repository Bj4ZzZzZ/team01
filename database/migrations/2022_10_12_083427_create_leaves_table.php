<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id()->comment("編號");
            $table->foreignId("sbid")->unsigned()->nullable(false)->comment("學生床位");
            $table->foreign('sbid')->references('id')->on('sbrecords')->onDelete('cascade');
            $table->date("start")->nullable(false)->comment("外宿日起");
            $table->date("end")->nullable(false)->comment("外宿日訖");
            $table->string("reason",191)->nullable(false)->comment("外宿原因");
            $table->boolean("floorhead_check")->nullable(false)->comment("樓長審核");
            $table->boolean("housemaster_check")->nullable(false)->comment("宿舍輔導員審核");
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
        Schema::dropIfExists('leaves');
    }
}
