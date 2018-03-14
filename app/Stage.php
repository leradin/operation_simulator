<?php

namespace SimulatorOperation;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stages';

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
    protected $fillable = [	'name',
    						'description',
    						'southwest',
							'northeast'];

   	/**
    * The attributes that aren't mass assignable.
    *
    * @var array
 	*/
	protected $guarded = ['id'];

	public function cabins(){
        return $this->belongsToMany('SimulatorOperation\Cabin')
        ->withPivot('unit_id','course', 'speed', 'altitude', 'init_position','lights_type');
    }

    public function computers(){
        return $this->belongsToMany('SimulatorOperation\Computer','computer_stage','stage_id','computer_id')->withPivot('cabin_id')->withTimestamps();
    }
}
