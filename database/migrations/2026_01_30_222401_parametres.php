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
        //
        Schema::create('parametres', function (Blueprint $table) {
    $table->id();
    $table->string('cle')->unique();
    $table->text('valeur');
    $table->string('type')->default('string');
    $table->string('groupe')->default('general');
    $table->text('description');
    $table->timestamps();
 });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametres');
    }
};
