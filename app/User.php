<?php

namespace SimulatorOperation;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'computer_id', 'exercise_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 'remember_token'];


    /**
    * Get the exercise record associated with once exercise.
    */
    public function exercise(){
        return $this->belongsTo('SimulatorOperation\Exercise');//->withPivot('cabin_id')->withTimestamps();
    }
}
