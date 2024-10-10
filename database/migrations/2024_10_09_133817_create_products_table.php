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
            $table->unsignedBigInterger('accounts_receivable')->nullable();
            $table->unsignedBigInterger('sales_account')->nullable();
            $table->unsignedBigInterger('inventory_account')->nullable();
            $table->unsignedBigInterger('COGS_account')->nullable();
            $table->unsignedBigInterger('sales_returns_account')->nullable();
            $table->unsignedBigInterger('purchase_returns_account')->nullable();
            $table->timestamps();
            $table->softDeletes();

           
            $table->foreign('accounts_receivable')->reference('id')->on('accounts')->onDelete('casade');
            $table->foreign('sales_account')->reference('id')->on('accounts')->onDelete('casade');
            $table->foreign('inventory_account')->reference('id')->on('accounts')->onDelete('casade');
            $table->foreign('COGS_account')->reference('id')->on('accounts')->onDelete('casade');
            $table->foreign('sales_returns_account')->reference('id')->on('accounts')->onDelete('casade');
            $table->foreign('purchase_returns_account')->reference('id')->on('accounts')->onDelete('casade');
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
