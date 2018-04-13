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

    /**
     * Get the meteorological_phenomenon's wind direction.
     *
     * @param  string  $value
     * @return string
     */
    public function getWindDirectionAttribute($value)
    {
        return str_replace("_"," ",implode(" ",explode("?",$value)));
    }

    /**
     * Get the meteorological_phenomenon's sea_state.
     *
     * @param  string  $value
     * @return string
     */
    public function getSeaStateAttribute($value)
    {
        return str_replace("_"," ",implode(" ",explode("?",$value)));
    }

    /**
     * Get the meteorological_phenomenon's cloud_type.
     *
     * @param  string  $value
     * @return string
     */
    public function getCloudTypeAttribute($value)
    {
        return str_replace("_"," ",implode(" ",explode("?",$value)));
    }

    /**
     * Get the meteorological_phenomenon's wind velocity.
     *
     * @param  string  $value
     * @return string
     */
    public function getWindVelocityAttribute($value)
    {
        return str_replace("_"," ",implode(" ",explode("?",$value)));
    }

    /**
     * Get the meteorological_phenomenon's type.
     *
     * @param  string  $value
     * @return string
     */
    public function getTypeAttribute($value)
    {
        return ucwords($value);
    }

    


    
}
