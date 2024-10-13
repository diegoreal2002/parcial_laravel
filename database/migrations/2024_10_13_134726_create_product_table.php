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
        Schema::create('product', function (Blueprint $table) {
            $table->id(); 
            $table->string('name', 150);
            $table->text('description')->nullable(); 
            $table->decimal('price', 8, 2); 
            $table->integer('stock'); 
            $table->boolean('is_available')->default(true); 
            $table->date('expiration_date')->nullable(); 
            $table->string('sku', 100)->unique(); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
