<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->id()->comment("編號");;
            $table->foreignId("sbid")->unsigned()->nullable(false)->comment("學生編號");            
            $table->foreign('sbid')->references('id')->on('sbrecords')->onDelete('cascade');
            $table->string("path",191)->nullable(true)->comment("照片路徑");
            $table->string("feature",191)->nullable(true)->comment("特徵值");
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
        Schema::dropIfExists('features');
    }
}
