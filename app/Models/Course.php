<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    public const BORRADOR = 1;
    public const REVISION = 2;
    public const PUBLICADO = 3;
    public const BLOQUEADO = 4;

    public static $tabla = 'courses';

    protected $fillable = [
        'user_id',
        'category_course_id',
        'level_id',
        'prize_id',
        'title',
        'slug',
        'subtitle',
        'descripcion',
        'status',
    ];

    /*
     * RELACIONES
    */

    //Relaciones 1 a 1
    //Relaciones 1 a M
    //Relaciones M a M
    //Relaciones 1 a 1 Inversa
    //Relaciones 1 a M Inversa
    public function Level(){
        return $this->belongsTo(Level::class);
    }
    public function CategoryCourse(){
        return $this->belongsTo(CategoryCourse::class);
    }
    public function Prize(){
        return $this->belongsTo(Prize::class);
    }
    //Relaciones M a M Inversa
    //Relaciones 1 a 1 Polimorfica
    //Relaciones 1 a M Polimorfica
    //Relaciones M a M Polimorfica
    //Relaciones 1 a 1 Polimorfica Inversa
    //Relaciones 1 a M Polimorfica Inversa
    //Relaciones M a M Polimorfica Inversa
}
