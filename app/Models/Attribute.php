<?php

namespace App\Models;

use App\Models\AttributeValue;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    /**
     * @var string
     */
    protected $table='attributes';

    /**
     * @var array
     */

    protected $fillable=['code','name','is_filterable','is_required','frontend_type'];

    /**
     * @var array
     */

    protected $casts=[
        'is_filterable'=>'boolean',
        'is_required'=>'boolean'
    ];


    public function values(){
        return $this->hasMany(AttributeValue::class);
    }
}
