<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use softDeletes;

    protected $fillable = ['name', 'category_id', 'slug', 'code', 'price', 'image', 'description', 'is_reccomended', 'status',
        'new', 'hit', 'count'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * method for calculating the order amount of a specific product
     * @return float|int
     */
    public function getPriceForCount()
    {
        return $this->pivot->count * $this->price;
    }

    /**
     * the method checks if the product is available in the warehouse
     * @return bool
     */
    public function isAvailable()
    {
        return $this->count > 0;
    }

    /**
     * method checks if the product is new
     * @return bool
     */
    public function isNew()
    {
        return $this->new === 1;
    }

    /**
     * method checks if the product is hit
     * @return bool
     */
    public function isHit()
    {
        return $this->hit === 1;
    }

    /**
     * method checks if the product is reccomended
     * @return bool
     */
    public function isReccomended()
    {
        return $this->is_reccomended === 1;
    }

//    public function setNewAttribute($value)
//    {
//        $this->attributes['new'] === $value;
//    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeHit($query)
    {
        return $query->where('hit',1);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeNew($query)
    {
        return $query->where('new',1);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeIs_reccomended($query)
    {
        return $query->where('is_reccomended',1);
    }
}
