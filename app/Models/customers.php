<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_image',
        'name',
        'designation',
        'description', 
        'phone',
        'whatsapp',
        'email',
        'instagram',
        'facebook',
        'tik_tok',
        'twitter',
        'youtube',
        'linkedin',
        'google_reviews',
        'website',
        'dummy',
        'address_link',
        'gallery_link1',
        'gallery_link2',
        'gallery_link3',
        'gallery_link4',
        'gallery_link5',
        'pdf'
    ];
}
