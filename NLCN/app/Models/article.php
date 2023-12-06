<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;
    protected $table = '_article_tables';
    protected $fillable =[
        'menu_id',
        'content_article',
        'header',
        'linkheader',
        'description',
        'active',
        'feature',
    ];

    public function menu(){
        return $this->hasOne(Menu::class , 'id', 'menu_id');
    }
}
