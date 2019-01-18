<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanService
{
    public function getPlans(){
        return ["basic", "standard", "premium"];
    }
}
