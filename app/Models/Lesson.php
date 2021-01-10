<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'section_id',
        'title',
    ];

    public static $tabla = 'lessons';

    public function Icon()
    {
        if ($this->Exam)
        {
            $icon = 'fas fa-book-open mr-2 text-gray-600';
        }elseif ($this->Meeting){
            $icon = 'fas fa-video mr-2 text-blue-600';
        }elseif ($this->Video){
            $icon = 'fas fa-play-circle mr-2 text-gray-600';
        }else{
            $icon = null;
        }
        return $icon;
    }

    public function Free(){
        $respuesta = false;
        if (isset($this->Exam->free) && $this->Exam->free == 1){
            $respuesta = true;
        }
        if (isset($this->Meeting->free) && $this->Meeting->free == 1){
            $respuesta = true;
        }
        if (isset($this->Video->free) && $this->Video->free == 1){
            $respuesta = true;
        }
        return $respuesta;
    }

    /*
 * RELACIONES
*/
    //Relaciones 1 a 1
    public function Description(){
        return $this->hasOne(Lesson::class);
    }
    public function Video(){
        return $this->hasOne(Video::class);
    }
    public function Meeting(){
        return $this->hasOne(Meeting::class);
    }
    public function Exam(){
        return $this->hasOne(Exam::class);
    }
    //Relaciones 1 a M
    //Relaciones M a M
    //Relaciones 1 a 1 Inversa
    //Relaciones 1 a M Inversa
    public function Section(){
        return $this->belongsTo(Section::class);
    }
    //trough

    //Relaciones M a M Inversa
    public function Users(){
        return $this->belongsToMany(User::class);
    }
    //Relaciones 1 a 1 Polimorfica
//    public function Note(){
//        return $this->morphOne(Note::class, 'noteable');
//    }
    //Relaciones 1 a M Polimorfica
//    public function Notes(){
//        return $this->morphmany(Note::class, 'noteable');
//    }
    public function Resources(){
        return $this->morphMany(Resource::class, 'resourceable');
    }
    public function Comments(){
        return $this->morphMany(Comment::class, 'comentable');
    }
    public function Reactions(){
        return $this->morphMany(Reaction::class, 'reactionable');
    }
    //Relaciones M a M Polimorfica
    //Relaciones 1 a 1 Polimorfica Inversa
    //Relaciones 1 a M Polimorfica Inversa
    //Relaciones M a M Polimorfica Inversa
}
