<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    use HasFactory;

    public const STATUS_SELECT = [
        '0'  => 'Inactive',
        '1'  => 'Active',
    ];
    
    protected $fillable = [
        'name',
        'description',
        'code',
        'redeem_count',
        'limit',
        'expires_at',
        'status',
        'user_id',
        'code_detail_id'
    ];
}
