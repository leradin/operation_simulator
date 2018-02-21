<?php

namespace SimulatorOperation;

use Illuminate\Database\Eloquent\Model;

class MeteorologicalPhenomenon extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'meteorological_phenomenons';

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
    						'type',
    						'wind_direction',
    						'sea_state',
    						'cloud_type',
                            'wind_velocity',
                            'temperature'
    					  ];
         
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    
}
