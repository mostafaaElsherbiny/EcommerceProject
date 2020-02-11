<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    //
    protected $table='attributes';
    protected $fillable=['code','name','is_filterable','is_required','frontend_type'];
    protected $casts=[
        'is_filterable'=>'boolean',
        'is_required'=>'boolean'
    ];

}
