<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory;
    use SoftDeletes;

    public static $tabla = 'notes';

    protected $fillable = [
        'user_id',
        'noteable_id',
        'noteable_type',
        'note',
    ];

    public function noteable(){
        return $this->morphTo();
    }

    /*
     * RELACIONES
    */

    //Relaciones 1 a 1
    //Relaciones 1 a M
    //Relaciones M a M
    //Relaciones 1 a 1 Inversa
    //Relaciones 1 a M Inversa
    public function User(){
        return $this->belongsTo(User::class);
    }
    //Relaciones M a M Inversa
    //Relaciones 1 a 1 Polimorfica
    //Relaciones 1 a M Polimorfica
    //Relaciones M a M Polimorfica
    //Relaciones 1 a 1 Polimorfica Inversa
    //Relaciones 1 a M Polimorfica Inversa
    //Relaciones M a M Polimorfica Inversa
}
