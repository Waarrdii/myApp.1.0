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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('category')->nullable();
            $table->decimal('buying_price', 8, 2)->nullable();
            $table->decimal('selling_price', 8, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->unsignedBigInteger('accounts_receivable')->nullable();
            $table->unsignedBigInteger('sales_account')->nullable();
            $table->unsignedBigInteger('inventory_account')->nullable();
            $table->unsignedBigInteger('COGS_account')->nullable();
            $table->unsignedBigInteger('sales_returns_account')->nullable();
            $table->unsignedBigInteger('purchase_returns_account')->nullable();
            $table->timestamps();
            $table->softDeletes();

           
            $table->foreign('accounts_receivable')->references ('id')->on('accounts')->onDelete('cascade');
            $table->foreign('sales_account')->references ('id')->on('accounts')->onDelete('cascade');
            $table->foreign('inventory_account')->references ('id')->on('accounts')->onDelete('cascade');
            $table->foreign('COGS_account')->references ('id')->on('accounts')->onDelete('cascade');
            $table->foreign('sales_returns_account')->references ('id')->on('accounts')->onDelete('cascade');
            $table->foreign('purchase_returns_account')->references ('id')->on('accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
