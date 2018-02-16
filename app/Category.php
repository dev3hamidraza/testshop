<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products(){
        return $this->belongsToMany("App\Product")->withTimestamps();
    }
}
