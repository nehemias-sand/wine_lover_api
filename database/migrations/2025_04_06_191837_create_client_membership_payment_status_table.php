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
        Schema::create('client_membership_payment_status', function (Blueprint $table) {
            $table->foreignId('client_membership_plan_id')->constrained('client_membership_plan');
            $table->foreignId('payment_method_id')->constrained('payment_method');
            $table->foreignId('payment_status_id')->constrained('payment_status');
            $table->foreignId('card_token_id')->constrained('card_token');
            $table->foreignId('billing_address_id')->constrained('address');
            $table->decimal('amount_paid', 8, 2)->nullable();
            $table->boolean('isProd')->default(true);
            $table->string('transaction_id')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();

            $table->primary(['client_membership_plan_id', 'payment_method_id', 'payment_status_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_membership_payment_status');
    }
};
