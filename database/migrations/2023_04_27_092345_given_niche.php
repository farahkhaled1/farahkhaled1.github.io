<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeywordsTable extends Migration
{
    public function up()
    {
        Schema::create('keywords', function (Blueprint $table) {
            $table->id();
            $table->string('word');
            $table->string('average_tfidf');
            $table->string('max_tfidf');
            $table->string('frequency');
            $table->string('niche');
        });
    }


    public function down()
    {
        Schema::dropIfExists('keywords');
    }
}
