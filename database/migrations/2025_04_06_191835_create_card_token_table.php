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
        Schema::create('card_token', function (Blueprint $table) {
            $table->id();
            $table->string('token')->unique();
            $table->longText('encrypted_data');
            $table->string('masked_number');
            $table->string('brand');
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
        Schema::dropIfExists('card_token');
    }
};
