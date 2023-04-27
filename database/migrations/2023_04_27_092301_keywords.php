<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateGivenNicheTable extends Migration
{
    public function up()
    {
        Schema::create('given_niche', function (Blueprint $table) {
            $table->id();
            $table->string('niche');
        });

    }

    public function down()
    {
        Schema::dropIfExists('given_niche');
    }
}