<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'imageURL',
        'description',
        'slug',
        'githubURL',
        'finished',
        'type_id'
    ];

    public function type() {
        return $this->belongsTo(Type::class);
    }
}
