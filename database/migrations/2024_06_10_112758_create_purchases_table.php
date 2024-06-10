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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('transaction_id')->unique();
            $table->foreign('transaction_id')
                ->references('transaction_id')
                ->on('transactions')
                ->onDelete('no action')
                ->onUpdate('cascade');
            
            $table->unsignedBigInteger('pricing_id');
            $table->foreign('pricing_id')
                  ->references('pricing_id')
                  ->on('pricings')
                  ->onDelete('no action')
                  ->onUpdate('cascade');

            $table->unsignedBigInteger('outfit_id');
            $table->foreign('outfit_id')
                ->references('outfit_id')
                ->on('outfits')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('no action')
                ->onUpdate('cascade');
                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};