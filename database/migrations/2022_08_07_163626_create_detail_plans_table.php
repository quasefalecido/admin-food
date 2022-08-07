<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPlansTable extends Migration
{
  public function up()
  {
    Schema::create('detail_plans', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('name');

      $table->unsignedBigInteger('plan_id');
      $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');

      $table->timestamps();

    });
  }

  public function down()
  {
    Schema::dropIfExists('detail_plans');
  }
}
