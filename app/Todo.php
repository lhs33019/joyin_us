<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public function todoLists() {

        return $this->belongsTo(TodoList::class)->exists();

    }
}
