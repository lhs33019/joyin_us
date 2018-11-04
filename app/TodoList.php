<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;


class TodoList extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];


    public function todos() {

        return $this->hasMany(ToDo::class)->exists();

    }
}
