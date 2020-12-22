<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    public static $tabla = 'comments';

    protected $fillable = [
        'user_id',
        'commentable_id',
        'commentable_type',
        'description',
    ];

    public function commentable(){
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
    public function Comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function Reactions(){
        return $this->morphMany(Reaction::class, 'reactionable');
    }
    //Relaciones M a M Polimorfica
    //Relaciones 1 a 1 Polimorfica Inversa
    //Relaciones 1 a M Polimorfica Inversa
    //Relaciones M a M Polimorfica Inversa
}
