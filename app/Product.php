<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public static function boot(){
        parent::boot();
        static::created(function($model){
            $model->netsuite_description = $model->id."...".substr($model->item_description,0,10);
            $model->save();
        });
        static::updated(function($model){
            $model->netsuite_description = $model->id."...".substr($model->item_description,0,10);
            $model->save();
        });

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordered_products(){
        return $this->hasMany('App\OrderContent');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(){
        return $this->belongsToMany("App\Category")->withTimestamps();
    }
}
