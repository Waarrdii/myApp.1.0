<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'category',
        'buying_price',
        'selling_price',
        'quantity',
        'accounts_receivable',
        'sales_account',
        'inventory_account',
        'COGS_account',
        'sales_returns_account',
        'purchase_returns_account'
    ];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'buying_price' => 'decimal:2',
        'selling_price' => 'decimal:2',
    ];

    /**
     * Get the accounts receivable relationship.
     */
    // public function accountsReceivable()
    // {
    //     return $this->belongsTo(Account::class, 'accounts_receivable');
    // }

    /**
     * Get the sales account relationship.
     */
    // public function salesAccount()
    // {
    //     return $this->belongsTo(Account::class, 'sales_account');
    // }

    /**
     * Get the inventory account relationship.
     */
    // public function inventoryAccount()
    // {
    //     return $this->belongsTo(Account::class, 'inventory_account');
    // }

    /**
     * Get the COGS account relationship.
     */
    // public function COGSAccount()
    // {
    //     return $this->belongsTo(Account::class, 'COGS_account');
    // }

    /**
     * Get the sales returns account relationship.
     */
    // public function salesReturnsAccount()
    // {
    //     return $this->belongsTo(Account::class, 'sales_returns_account');
    // }

    /**
     * Get the purchase returns account relationship.
     */
    // public function purchaseReturnsAccount()
    // {
    //     return $this->belongsTo(Account::class, 'purchase_returns_account');
    // }
    
    public function wherehouse(){
        return $this -> belongsToMany(Warehouses::class, 'product_warehouse');
    }
}
