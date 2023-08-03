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
            $table->foreign('user_id')->references('id')->on('users');
            $table->json('tags')->default(json_encode(['computer-sciences','cybersecurity']));
            $table->enum('categories', ['Devellopement Web', 'Ingnierie Logiciel', 'SEO', 'Marketing','AI','Réseaux Informatiques','Cybersécurité','Hacking','Cryptomonaie','Graphisme-Design','UX/UI'])->default('Graphisme-Design');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles');
    }
};
