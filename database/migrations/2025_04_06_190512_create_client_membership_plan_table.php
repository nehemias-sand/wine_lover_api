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
            $table->dateTime('end_date');
            $table->decimal('price', 8, 2);
            $table->boolean('automatic_renewal');
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
