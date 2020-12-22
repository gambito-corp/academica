<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    const LIKE = 1;
    const DISLIKE = 2;

    public static $tabla = 'reactions';

    protected $fillable = [
        'user_id',
        'reactionable_id',
        'reactionable_type',
        'value',
    ];

    public function reactionable(){
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
