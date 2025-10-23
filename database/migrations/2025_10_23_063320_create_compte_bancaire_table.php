<?php

use Illuminate\Database\Eloquent\Relations\Relation;
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
        Schema::create('compte_bancaire', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('numero')->unique();
            $table->enum('type_compte' , ['Epargne' , 'Chéque'])->default('Epargne');
            $table->uuid('user_id'); // Clé étrangère UUID

            $table->timestamps();

            // Relation avec la table users
            $table->foreign('user_id')->references('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compte_bancaire');
    }
};
