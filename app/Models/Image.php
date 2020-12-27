<?php

namespace App\Models;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory;
    use SoftDeletes;

    public static $tabla = 'images';

    protected $fillable = [
        'imageable_id',
        'imageable_type',
        'url',
    ];

    public function imageable(){
        return $this->morphTo();
    }

    public function hash($id, $decode = null)
    {
        $hashids = new Hashids();
        return is_null($decode)
            ?  $hashids->encode($id,0,1,2,3,4,5)
            :  $hashids->decode($id)[0];
    }

    /*
     * RELACIONES
    */

    //Relaciones 1 a 1
    //Relaciones 1 a M
    //Relaciones M a M
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
