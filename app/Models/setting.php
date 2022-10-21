<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_logo',
        'footer_logo',
        'site_title',
        'footer_des',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'linkedin',
        'pinterest',
        'address',
        'phone',
        'email',
        'copy_right',
    ];

    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];
}
