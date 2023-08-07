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
        Schema::table('articles', function (Blueprint $table) {
            $table->bigInteger('user_id')->nullable(0);
            $table->bigInteger('tag_id')->nullable(0);
            $table->bigInteger('categorie_id')->nullable(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['user_id']);
            $table->dropColumn(['tag_id']);
            $table->dropColumn(['categorie_id']);
        });
    }
};
