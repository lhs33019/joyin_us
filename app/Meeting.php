<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Meeting extends Model
{
    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];

    public function addUser(User $user) {
        if($this->join_number < $this->limit) {
            $list = json_decode($this->user_list);

            if (!$list) {
                $list = [];
            }
            if (!in_array($user->id,$list)) {
                array_push($list, $user->id);
                $this->user_list = json_encode($list);
                $this->join_number +=1;
                $this->update();
            }
        }
    }

    public function removeUser(User $user) {
        if($this->join_number > 0) {
            $list = json_decode($this->user_list);

            if (!$list) {
                $list = [];
            }
            if (in_array($user->id,$list)) {
                $key = array_search( $user->id, $list );
                array_splice( $list, $key, 1 );
                $this->user_list = json_encode($list);
                $this->join_number -=1;
                $this->update();
            }
        }
    }
}
