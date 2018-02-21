<?php

namespace SimulatorOperation;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sensors';

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
    						'type_sensor',
    						'scope_sensor',
    						'brand',
    						'model'

    					  ];
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function units(){
        return $this->belongsToMany('SimulatorOperation\Unit');
    }
    
    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute(){
        return "{$this->name} ({$this->type_sensor} - {$this->scope_sensor})";
    }
}
