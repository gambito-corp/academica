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
    public static $carpeta = 'courses';
    protected $withCount = ['Students', 'Reviews'];

    public function getRatingAttribute()
    {
        if ($this->reviews_count)
            return round($this->Reviews->avg('rating'), 1);
        else{
            return 5;
        }
    }

    protected $fillable = [
        'user_id',
        'category_course_id',
        'level_id',
        'prize_id',
        'title',
        'slug',
        'subtitle',
        'descripcion',
    ];

    /*
     * RELACIONES
    */

    //Relaciones 1 a 1
    //Relaciones 1 a M
    public function Goals(){
        return $this->hasMany(Goal::class);
    }
    public function Requirements(){
        return $this->hasMany(Requirement::class);
    }
    public function Audiences(){
        return $this->hasMany(Audience::class);
    }
    public function Qualifications(){
        return $this->hasMany(Qualification::class);
    }
    public function Reviews(){
        return $this->hasMany(Review::class);
    }
    public function Sections(){
        return $this->hasMany(Section::class);
    }
    public function Lessons(){
        return $this->hasManyThrough(Lesson::class, Section::class);
    }
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
    public function Teacher(){
        return $this->belongsTo(User::class, 'user_id');
    }
    //Relaciones M a M Inversa
    public function Students(){
        return $this->belongsToMany(User::class);
    }
    //Relaciones 1 a 1 Polimorfica
    public function Image(){
        return $this->morphOne(Image::class, 'imageable');
    }
    //Relaciones 1 a M Polimorfica
    //Relaciones M a M Polimorfica
    //Relaciones 1 a 1 Polimorfica Inversa
    //Relaciones 1 a M Polimorfica Inversa
    //Relaciones M a M Polimorfica Inversa
}
