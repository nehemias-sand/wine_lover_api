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
        Schema::create('cashback_history', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 8, 2);
            $table->string('transaction_code');
            $table->enum('type', ['Membership refund', 'Order'])->default('Order');
            $table->foreignId('client_id')->constrained('client');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashback_history');
    }
};
