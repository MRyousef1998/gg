<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportType extends Model
{
protected $fillable=[
'type'

];
public function contectsupport(){
    return $this->hasMany( ContectSupport::class);
}
}
