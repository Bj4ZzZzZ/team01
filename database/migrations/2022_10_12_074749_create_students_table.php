<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id()->comment("編號");
            $table->string("number",191)->nullable(false)->comment("學號");
            $table->string("class",191)->nullable(false)->comment("班級");
            $table->string("name",191)->nullable(false)->comment("姓名");
            $table->string("address",191)->nullable(true)->comment("地址");
            $table->string("phone",191)->nullable(true)->comment("電話");
            $table->string("nationality",191)->nullable(true)->comment("國籍");
            $table->string("guardian",191)->nullable(false)->comment("關係人");
            $table->string("salutation",191)->nullable(false)->comment("稱謂");
            $table->string("remark",191)->nullable(true)->comment("備註");
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
        Schema::dropIfExists('students');
    }
}
