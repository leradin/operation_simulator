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
        return $this->belongsToMany('SimulatorOperation\Cabin','cabin_stage_unit', 'stage_id', 'cabin_id')
        ->withPivot('unit_id','course', 'speed', 'altitude', 'init_position','lights_type');
    }

    public function tracks(){
        return $this->belongsToMany('SimulatorOperation\Track','stage_track', 'stage_id', 'track_id')
        ->withPivot('course', 'speed', 'altitude', 'init_position','object_type','source');
    }

    public function meteorologicalPhenomenons(){
        return $this->belongsToMany('SimulatorOperation\MeteorologicalPhenomenon','meteorological_phenomenon_stage','stage_id','meteorological_id')->withPivot('radio','init_position');
    }

    public function units(){
        return $this->belongsToMany('SimulatorOperation\Unit','cabin_stage_unit','stage_id','unit_id')
        ->withPivot('unit_id','course', 'speed', 'altitude', 'init_position','lights_type','stage_id');
    }

    public function computers(){
        return $this->belongsToMany('SimulatorOperation\Computer','computer_stage','stage_id','computer_id')->withPivot('cabin_id','stage_id')->withTimestamps();
    }

    public function exercises(){
        return $this->belongsToMany('SimulatorOperation\Exercise');
    }
}
