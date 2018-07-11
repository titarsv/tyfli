<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{

    protected $fillable = [
        'attribute_id',
        'name'
    ];

    protected $table = 'attribute_values';
    public $timestamps = false;

    public function attribute()
    {
        return $this->belongsTo('App\Models\Attribute', 'attribute_id');
    }
}
