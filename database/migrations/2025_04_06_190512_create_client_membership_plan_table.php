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
        Schema::create('client_membership_plan', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('active')->default(false);
            $table->decimal('refund_amount', 8, 2)->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('cashback_percentage');
            $table->boolean('automatic_renewal')->default(false);
            $table->foreignId('client_id')->constrained('client');
            $table->foreignId('membership_id')->constrained('membership');
            $table->foreignId('plan_id')->constrained('plan');
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
        Schema::dropIfExists('client_membership_plan');
    }
};
