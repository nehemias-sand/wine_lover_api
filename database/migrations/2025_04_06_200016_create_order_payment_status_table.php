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
        Schema::create('order_payment_status', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained('order');
            $table->foreignId('payment_method_id')->constrained('payment_method');
            $table->foreignId('payment_status_id')->constrained('payment_status');
            $table->decimal('amount_paid', 8, 2)->nullable();
            $table->boolean('isProd')->default(true);
            $table->string('transaction_id')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();

            $table->primary(['order_id', 'payment_method_id', 'payment_status_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_payment_status');
    }
};
