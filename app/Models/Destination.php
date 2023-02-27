<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $table = 'destinatios';

    public function reservation(){
        return $this->hasOne(Reservation::class, 'id', 'hotel_id');
    }
}
