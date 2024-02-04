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
        Schema::create('material_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('material_id');
            $table->string('quantity');

            $table->index('product_id', 'material_product_product_idx');
            $table->index('material_id', 'material_product_material_idx');

            $table->foreign('product_id', 'material_product_product_fk')->on('products')->references('id');
            $table->foreign('material_id', 'material_product_material_fk')->on('materials')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_products');
    }
};
