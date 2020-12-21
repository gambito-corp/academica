<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'exam_id',
        'title',
        'points',
        'feedback',
    ];

    public static $tabla = 'questions';

    /*
 * RELACIONES
*/
    //Relaciones 1 a 1
    //Relaciones 1 a M
    //Relaciones M a M
    public function Answer(){
        return $this->belongsToMany(Answer::class);
    }
    //Relaciones 1 a 1 Inversa
    public function Exam(){
        return $this->belongsTo(Exam::class);
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
