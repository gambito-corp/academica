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
    protected $withCount = ['Students', 'Reviews', 'Comments'];

    //geters
    public function getTablaAttribute()
    {
        return self::$tabla;
    }

    public function getCommentsAttribute()
    {
        if ($this->Comments()){
            return $this->Comments()->count();
        }
    }

    public function getRatingAttribute()
    {
        if ($this->reviews_count)
            return round($this->Reviews->avg('rating'), 1);
        else{
            return 5;
        }
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Query Scope
    public function scopeCategory($query, $category_id)
    {
        if ($category_id){
            return $query->where('category_course_id', $category_id);
        }
    }

    public function scopeLevel($query, $level_id)
    {
        if ($level_id){
            return $query->where('level_id', $level_id);
        }
    }

    public function scopePrize($query, $prize_id)
    {
        if ($prize_id){
            return $query->where('prize_id', $prize_id);
        }
    }

    //Metodos Personalizados
    public function Related(){
        $related = Course::where('category_course_id', $this->category_course_id)
            ->where('id', '!=', $this->id)
            ->where('status', self::PUBLICADO)
            ->latest('id')
            ->take(5)
            ->get();
        return $related;
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

    public function Comments(){
        return $this->morphMany(Comment::class, 'comentable');
    }
    public function Coments(){
        return $this->morphMany(Comment::class, 'comentable');
    }
    //Relaciones M a M Polimorfica
    //Relaciones 1 a 1 Polimorfica Inversa
    //Relaciones 1 a M Polimorfica Inversa
    //Relaciones M a M Polimorfica Inversa
}
