<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->string('titulo');
            $table->string('desarrolladora');
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
            $table->date('fechalanzamiento');
            $table->text('descripcion');
            $table->string('imagen');
            $table->integer('publicado')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropForeign('games_user_id_foreign');
            $table->dropForeign('games_categoria_id_foreign');
            $table->dropColumn(['titulo', 'desarrolladora', 'categoria_id',
             'fechalanzamiento', 'descripcion', 'imagen', 'publicado', 'user_id']);  
        });
    }
};
