<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    public static $tabla = 'tags';

    protected $fillable = [
        'title',
        'slug',
    ];


    /*
     * RELACIONES
    */

    //Relaciones 1 a 1
    //Relaciones 1 a M
    //Relaciones M a M
    public function Post(){
        return $this->belongsToMany(Post::class);
    }
    //Relaciones 1 a 1 Inversa
    //Relaciones 1 a M Inversa
    //Relaciones M a M Inversa
    //Relaciones 1 a 1 Polimorfica
    //Relaciones 1 a M Polimorfica
    //Relaciones M a M Polimorfica
    //Relaciones 1 a 1 Polimorfica Inversa
    //Relaciones 1 a M Polimorfica Inversa
    //Relaciones M a M Polimorfica Inversa

}
