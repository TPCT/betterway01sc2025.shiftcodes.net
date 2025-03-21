<?php

namespace App\V1\Plan;

use Illuminate\Database\Eloquent\Model;

class PlanNetworkAgency extends Model
{
    protected $table = 'plannetworkagencies';
    protected $primaryKey = 'IDPlanNetworkAgency';
    
    
     public function planNetwork()
    {
        return $this->belongsTo(PlanNetwork::class, 'IDPlanNetwork', 'IDPlanNetwork');
    }
    
}
