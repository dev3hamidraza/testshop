<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App
 */
class Order extends Model
{
    protected $table = 'orders';
    const STATUS_DRAFT = 1;
    const STATUS_APPROVED = 2;
    const STATUS_DELETED = 3;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contents(){
        return $this->hasMany('App\OrderContent');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User');
    }
}
