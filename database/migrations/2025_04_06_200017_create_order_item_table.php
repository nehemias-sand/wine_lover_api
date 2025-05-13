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
        Schema::create('order_item', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained('order');
            $table->foreignId('product_id')->constrained('product');
            $table->foreignId('presentation_id')->constrained('presentation');
            $table->integer('amount');
            $table->decimal('unit_price', 8, 2);
            $table->decimal('discount', 8, 2);
            $table->decimal('subtotal_item', 8, 2);
            $table->decimal('subtotal_cashback', 8, 2);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();

            $table->primary(['order_id', 'product_id', 'presentation_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_item');
    }
};
