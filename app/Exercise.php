<?php

namespace SimulatorOperation;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'exercises';

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
    						'is_played',
    						'configuration_file',
    						'scheduler',
    						'datetime_root'];

   	/**
    * The attributes that aren't mass assignable.
    *
    * @var array
 	*/
	protected $guarded = ['id'];

	/*public function cabins(){
        return $this->belongsToMany('SimulatorOperation\Cabin')
        ->withPivot('course', 'speed', 'altitude', 'init_position');
    }*/
}
