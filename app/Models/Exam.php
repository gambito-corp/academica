<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exam extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'lesson_id',
        'title',
        'started_at',
        'finaliced_at',
        'duration',
        'attempts',
        'min',
        'max',
        'random',
        'password',
    ];

    public static $tabla = 'exams';

    /*
 * RELACIONES
*/
    //Relaciones 1 a 1
    //Relaciones 1 a M
    public function Questions(){
        return $this->hasMany(Question::class);
    }
    //Relaciones M a M
    //Relaciones 1 a 1 Inversa
    public function Lesson(){
        return $this->belongsTo(Lesson::class);
    }
    //Relaciones 1 a M Inversa
    //Relaciones M a M Inversa
    //Relaciones 1 a 1 Polimorfica
    public function Note(){
        return $this->morphOne(Note::class, 'noteable');
    }
    //Relaciones 1 a M Polimorfica
    //Relaciones M a M Polimorfica
    //Relaciones 1 a 1 Polimorfica Inversa
    //Relaciones 1 a M Polimorfica Inversa
    //Relaciones M a M Polimorfica Inversa
}
