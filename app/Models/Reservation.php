<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    public function user(){
        //tabla a la que se relaciona, 
        return $this->hasOne(User::class, 'id', 'id_user');
        
    }

    public function canal(){
        //tabla a la que se relaciona, columna hija, columna padre
        return $this->hasOne(Canal::class, 'id', 'id_canal');
    }

    public function destination(){
        //tabla a la que se relaciona, 
        return $this->hasOne(Destination::class, 'id', 'hotel_id');
    }

}
