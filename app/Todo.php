<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{

    protected $guarded = ['id'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function todoLists() {

        return $this->belongsTo(TodoList::class)->exists();

    }
}
