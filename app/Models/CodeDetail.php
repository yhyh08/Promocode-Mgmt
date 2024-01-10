<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'minimum_price', 
        'discount_amount',
        'discount_type_id',
        'term_condition_id'
    ];

    public function discountType()
    {
        return $this->belongsTo(DiscountType::class, 'discount_type_id');
    }

    // public function termCondition()
    // {
    //     return $this->belongsTo(TermCondition::class);
    // }

    public function setTermAttribute($value)
    {
        $this->attributes['term_condition_id'] = json_encode($value);
    }

    public function getTermAttribute($value)
    {
        return $this->attributes['term_condition_id'] = json_decode($value);
    }
}
