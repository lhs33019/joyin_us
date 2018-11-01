<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    public function todos() {

        return $this->hasMany(ToDo::class)->exists();

    }
}
