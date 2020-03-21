<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['brand_id','sku','name','slug','description','quantity','weight','price','sale_price','status','featured'];

    protected $casts=[
        'brand_id'=>'integer',
        'quantity'=>'integer',
        'status'=>'boolean',
        'featured'=>'boolean',
    ];

    public function setNameAttribute($value){
        $this->attributes['name']=$value;
        $this->attributes['slug']=Str::slug($value);
    }

    public function brand(){
       return $this->belongsTo(Brand::class);
    }

    public function images(){
        return $this->hasMany(ProductImage::class);
    }

    public function attributes()
        {
    return $this->hasMany(ProductAttribute::class);
        }

        public function categories(){
            return $this->belongsToMany(Category::class,'product_categories','product_id','category_id');
        }
}
