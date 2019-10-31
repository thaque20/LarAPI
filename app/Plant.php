<?php

namespace App;

use App\DataLog;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    public function datalogs(){
        return $this->hasMany(DataLog::class);
    }
}
