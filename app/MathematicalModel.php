<?php

namespace SimulatorOperation;

use Illuminate\Database\Eloquent\Model;
use Lang;

class MathematicalModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mathematical_models';

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
    						'path',
    						'unit_type_id'
    					  ];
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id']; 

    public function unitType(){
        return $this->belongsTo('SimulatorOperation\UnitType');
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute(){
        return "{$this->name} ({$this->path})";
    }
}
