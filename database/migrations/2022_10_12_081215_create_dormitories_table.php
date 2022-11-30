<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDormitoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dormitories', function (Blueprint $table) {
            $table->id()->comment("編號");
            $table->string("name",191)->nullable(false)->comment("宿舍名稱");
            $table->string("housemaster",191)->nullable(false)->comment("舍監");
            $table->string("contact",191)->nullable(false)->comment("聯絡資料");
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
        Schema::dropIfExists('dormitories');
    }
}
