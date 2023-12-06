<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailArticel extends Model
{
    use HasFactory;
    protected $table='_img_articel';
    protected $fillname = [
        'articel_id',
        'mutiImg'
    ];
    public function Articel(){
        return $this->belongsTo('App\article');
    }
}
