<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'logo',
        'site_name', 'email', 'phone', 'address', 
        'facebook', 'instagram', 'linkedin', 'twitter',
        'theme_color','hero_image','show_hero', 'show_partners', 'show_services', 'show_pricing', 
    'show_portfolio', 'show_testimonials', 'show_contact'
    ];
}
