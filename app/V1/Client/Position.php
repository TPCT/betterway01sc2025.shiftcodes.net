<?php

namespace App\V1\Client;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';
    protected $primaryKey = 'IDPosition';

    public function positionforclients()
    {
        return $this->hasMany(PositionsForClients::class, "IDPosition")->where('Status', 'PENDING');
    }
    public function rejectedPositionForClients()
    {
        return $this->hasMany(PositionsForClients::class, 'IDPosition')
            ->where('Status', 'REJECTED');
    }
    public function position_brands(){
        return $this->hasMany(PositionBrand::class, 'IDPosition');
    }
    
    public function clients()
    {
        return $this->hasMany(Client::class, 'IDPosition', 'IDPosition');
    }
}
