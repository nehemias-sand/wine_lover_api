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
        Schema::create('product_presentation', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('product');
            $table->foreignId('presentation_id')->constrained('presentation');
            $table->integer('stock');
            $table->decimal('unit_price', 8, 2);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();

            $table->primary(['product_id', 'presentation_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_presentation');
    }
};
