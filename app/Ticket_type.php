<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket_type extends Model
{
protected $fillable=[
    'name'
];
public function tickets(){
return $this->hasMany(Ticket::class);}

}
