<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lates', function (Blueprint $table) {
            $table->id()->comment("編號");
            $table->foreignId("sbid")->unsigned()->nullable(false)->comment("學生床位");
            $table->foreign('sbid')->references('id')->on('sbrecords')->onDelete('cascade');
            $table->date("start")->nullable(false)->comment("長期晚歸日起");
            $table->date("end")->nullable(false)->comment("長期晚歸日訖");
            $table->string("reason",191)->nullable(false)->comment("長期晚歸原因");
            $table->string("company",191)->nullable(false)->comment("單位名稱");
            $table->string("contact",191)->nullable(false)->comment("單位連絡電話");
            $table->string("address",191)->nullable(false)->comment("單位聯絡地址");
            $table->time("back_time")->nullable(false)->comment("預計每日返回宿舍時間");
            $table->string("filename_path",191)->nullable(false)->comment("佐證圖檔路徑");
            $table->boolean("floorhead_check")->nullable(false)->comment("樓長審核");
            $table->boolean("chief_check")->nullable(false)->comment("總樓長審核");
            $table->boolean("housemaster_check")->nullable(false)->comment("宿舍輔導員審核");
            $table->boolean("admin_check")->nullable(false)->comment("行政審核");
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
        Schema::dropIfExists('lates');
    }
}
