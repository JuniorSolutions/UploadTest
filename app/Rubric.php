<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubric extends Model
{
    protected $fillable = ['title', 'parent_id', 'created_by', 'modified_by'];

    public function children() {
                return $this->hasMany(self::class, 'parent_id');
    }
}
