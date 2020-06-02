<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path',
    ];

    public function imageable()
    {
        return $this->morphTo(); // ya sabe que es con imageable por se consistente en los nmbre resuelve si es un user o product
    }
}
