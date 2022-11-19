<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\First;
class Second extends Model
{
    use HasFactory;
    protected $guarded =  ['created_at', 'updated_at']; 

    protected $dates = ['published_at'];

     //__Join with Category__//
     public function firsts(){
        return $this->belongsTo(First::class, 'first_id');  //User ID
    }
}
