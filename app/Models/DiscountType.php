<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountType extends Model
{
    use HasFactory;

    public const CATEGORY_SELECT = [
        '1'  => 'Coupons',
        '2'  => 'Vouchers',
    ];

    public const TYPE_SELECT = [
        '1'  => 'Price Discount',
        '2'  => 'Percentage Discount',
    ];

    protected $fillable = [
        'name',
        'category',
        'type',
        'remark'
    ];

    public function codeDetails()
    {
        return $this->hasMany(CodeDetail::class);
    }
}
