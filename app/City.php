<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table='Cities';
    protected $primaryKey='id';
    public function country()
    {
        return $this ->belongsTo(Country::class,'country_id','id');
    }
    public function state()
    {
        return $this ->belongsTo(State::class,'state_id','id');
    }
}
