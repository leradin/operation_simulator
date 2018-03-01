<?php

namespace SimulatorOperation;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'units';

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
    protected $fillable = [ 'station',
    						'name',
    						'numeral',
    						'country',
    						'serial_number',
                            'image',
                            'unit_type_id',
                            'sensor_id',
                            'number_engines'
    					  ];
         
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];


    public function unitType()
    {
        return $this->belongsTo('SimulatorOperation\UnitType','unit_type_id','id');
    }

    public function sensors()
    {
        return $this->belongsToMany('SimulatorOperation\Sensor');
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getNameWithNumeralAttribute(){
        return "{$this->name} ({$this->numeral})";
    }
}
