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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('code', 3)->unique();      // USD, PEN, EUR
            $table->string('symbol', 10);            // $, S/.
            $table->string('name');                  // US Dollar
            $table->string('symbol_native', 10);     // Símbolo nativo
            $table->integer('decimal_digits');       // Cantidad de decimales
            $table->decimal('rounding', 8, 2);       // Redondeo
            $table->string('name_plural');           // Nombre plural
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
