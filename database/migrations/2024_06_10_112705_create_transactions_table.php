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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('payment_reference')->unique();
            $table->integer('payment_price_ttc');
            $table->string('payment_currency')->default('Fcfa');
            $table->string('payment_method');
            $table->string('payment_status')->default('pending');

            $table->unsignedBigInteger('pricing_id'); 
            $table->foreign('pricing_id')
                     ->references('id')
                     ->on('pricings')
                     ->onDelete('no action')
                     ->onUpdate('cascade');

            $table->unsignedBigInteger('room_id')->nullable(); 
            $table->foreign('room_id')
                    ->references('id')
                    ->on('rooms')
                    ->onDelete('no action')
                    ->onUpdate('cascade')
                    ->nullable();

            $table->unsignedBigInteger('outfit_id')->nullable(); 
            $table->foreign('outfit_id')
                    ->references('id')
                    ->on('outfits')
                    ->onDelete('no action')
                    ->onUpdate('cascade')
                    ->nullable();

            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')
                     ->references('id')
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
        Schema::dropIfExists('transactions');
    }
};
