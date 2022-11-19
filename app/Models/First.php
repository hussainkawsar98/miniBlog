<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Second;

class First extends Model
{
    use HasFactory;

    protected $guarded =  ['created_at', 'updated_at']; 

    protected $dates = ['published_at'];

     //__Join with Category__//
     public function seconds(){
        return $this->hasMany(Second::class, 'first_id');
    }
}
