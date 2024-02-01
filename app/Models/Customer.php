<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'code';
    public $incrementing = false;

    public function getRouteKeyName()
    {
        return 'code';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'name',
        'manager_name',
        'phone_number',
        'country',
        'city',
        'street',
        'street_number'
    ];

}
