<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSbrecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sbrecords', function (Blueprint $table) {
            $table->id()->comment("編號");
            $table->smallInteger("school_year")->unsigned()->nullable(false)->comment("學年");
            $table->tinyInteger("semester")->unsigned()->nullable(false)->comment("學期");
            $table->foreignId("sid")->unsigned()->nullable(false)->comment("學生編號");
            $table->foreignId("bid")->unsigned()->nullable(false)->comment("床位");
            $table->foreign('sid')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('bid')->references('id')->on('beds')->onDelete('cascade');
            $table->boolean("floor_head")->nullable(true)->comment("樓長")->default(false);
            $table->string("responsible_floor",191)->nullable(true)->comment("負責的樓層");

            
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
        Schema::dropIfExists('sbrecords');
    }
}
