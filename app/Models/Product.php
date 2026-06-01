<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // table name
    protected $table = 'tbl_products';

    // primary key
    protected $primaryKey = 'ProductID';

    // columns that can be filled
    protected $fillable = [
        'StaffID',
        'ProductName',
        'ProductQty',
        'ProductPrice',
    ];

    // relationship - product belongs to a user
    public function staff()
    {
        return $this->belongsTo(User::class, 'StaffID', 'StaffID');
    }
}
