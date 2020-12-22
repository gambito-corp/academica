<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    public const BORRADOR = 1;
    public const REVISION = 2;
    public const PUBLICADO = 3;
    public const BLOQUEADO = 4;

    public static $tabla = 'posts';

    protected $fillable = [
        'user_id',
        'category_post_id',
        'title',
        'slug',
        'extract',
        'body',
    ];

    /*
     * RELACIONES
    */

    //Relaciones 1 a 1
    //Relaciones 1 a M
    //Relaciones M a M
    public function Tags(){
        return $this->belongsToMany(Tag::class);
    }
    //Relaciones 1 a 1 Inversa
    //Relaciones 1 a M Inversa
    public function Category(){
        return $this->belongsTo(CategoryPost::class);
    }
    //Relaciones M a M Inversa
    //Relaciones 1 a 1 Polimorfica
    public function Image(){
        return $this->morphOne(Image::class, 'imageable');
    }
    //Relaciones 1 a M Polimorfica
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
