<?php

namespace SimulatorOperation;

use Illuminate\Database\Eloquent\Model;

class UnitType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'unit_types';

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
    						'abbreviation'
    					  ];
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function mathematicalModel(){
        return $this->hasOne('SimulatorOperation\MathematicalModel');
    }

    public function units(){
        return $this->hasMany('SimulatorOperation\Unit');
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute(){
        return "{$this->name} ({$this->abbreviation})";
    }
}
