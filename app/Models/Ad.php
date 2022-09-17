<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * @mixin Builder
 */

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'subcategory_id',
    ];

    public function subcategory()
    {
        return $this->hasMany(Ad::class);
    }

}
