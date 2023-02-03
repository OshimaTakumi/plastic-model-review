<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();//投稿者のid
            $table->string('title', 50);//口コミのタイトル
            $table->string('body', 500);//口コミの内容
            $table->string('review');//5段階の評価
            $table->string('name', 50);//プラモデル名
            $table->string('grade',);//グレード
            $table->integer('height', );//高さ
            $table->integer('runner', );//ランナーの数
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
