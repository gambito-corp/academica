<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory;
    use SoftDeletes;

    public static $tabla = 'profiles';

    protected $fillable = [
        'user_id',
        'titulo',
        'bio',
        'web',
        'facebook',
        'linkedin',
    ];


    /*
     * RELACIONES
     */

    //Relaciones 1 a 1
    //Relaciones 1 a M
    //Relaciones M a M
    //Relaciones 1 a 1 Inversa
    public function User(){
        return $this->belongsTo(User::class);
    }
    //Relaciones 1 a M Inversa
    //Relaciones M a M Inversa
    //Relaciones 1 a 1 Polimorfica
    //Relaciones 1 a M Polimorfica
    //Relaciones M a M Polimorfica
    //Relaciones 1 a 1 Polimorfica Inversa
    //Relaciones 1 a M Polimorfica Inversa
    //Relaciones M a M Polimorfica Inversa
}
