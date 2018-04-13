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
    						'stage_id',
    						'scheduled_date_time',
    						'supremed_date_time',
    						'user_id',
                            'is_played',
                            'configuration_file',
                            'path_configuration_file'];
   	/**
    * The attributes that aren't mass assignable.
    *
    * @var array
 	*/
	protected $guarded = ['id'];

	/*public function stage(){
        return $this->belongsTo('SimulatorOperation\Stage');
    }*/
    public function stages(){
        return $this->belongsToMany('SimulatorOperation\Stage');
    }

    public function users(){
        return $this->hasMany('SimulatorOperation\User');
    }
}
