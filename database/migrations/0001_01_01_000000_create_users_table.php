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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('prenom');
            $table->string('nom');
            $table->string('login')->unique();
            $table->string('email')->unique();
            $table->enum('type_user', ['admin' , 'client'])->default('admin');
            $table->enum('statut' , ['actif' , 'inactif']);
            $table->string('cni');
            $table->string('adresse');
            $table->string('password');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
