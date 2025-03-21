<?php

namespace App\V1\Plan;

use Illuminate\Database\Eloquent\Model;
use App\V1\Client\Client;

class PlanNetwork extends Model
{
    protected $table = 'plannetwork';
    protected $primaryKey = 'IDPlanNetwork';

    protected $guarded = [];

    public function planProduct()
    {
        return $this->belongsTo(PlanProduct::class, 'IDPlanProduct', 'IDPlanProduct');
    }
    
    public function referralClient()
{
    return $this->belongsTo(Client::class, 'IDReferralClient');
}

    public function client()
    {
        return $this->belongsTo(Client::class, 'IDClient', 'IDClient');
    }

    public function referral()
    {
        return $this->belongsTo(Client::class, 'IDReferralClient', 'IDClient');
    }

    public function agencies()
    {
        return $this->belongsTo(PlanNetworkAgency::class, 'IDPlanNetwork', 'IDPlanNetwork');
    }

    public function children()
    {
        return $this->belongsTo(PlanNetwork::class, 'IDParentClient', 'IDClient');
    }
    
     public function uplines()
    {
    return $this->belongsTo(Client::class , 'IDClient');
    }
    
  
}
