<?php

namespace SimulatorOperation;

use Illuminate\Database\Eloquent\Model;
use Lang;

class Computer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'computers';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name',
    						'ip_address',
    						'mac_address',
    						'label_arduino',
    						'cabin_id',
    						'computer_type_id'
    					  ];
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function computerType()
    {
        return $this->belongsTo('SimulatorOperation\ComputerType','computer_type_id','id');
    }

    public function cabin(){
        return $this->belongsTo('SimulatorOperation\Cabin','cabin_id','id');
    }

    /**
    * Get the device record associated with the computer.
    */
    public function devices()
    {
        return $this->hasMany('SimulatorOperation\Device');
    }

    /**
    * Get the stages record associated with many computer.
    */
    public function stages(){
        return $this->belongsToMany('SimulatorOperation\Stage')->withPivot('cabin_id')->withTimestamps();
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute(){
         $fullName = "\n ".Lang::get('messages.name')." : {$this->name} | "
         .Lang::get('messages.ip_address')." : {$this->ip_address} | "
         .Lang::get('messages.label')." : {$this->label_arduino} \n";
         return $fullName ? $fullName : Lang::get('messages.unassigned');
    }
}
