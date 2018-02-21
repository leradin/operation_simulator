<?php

namespace SimulatorOperation;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tracks';

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
    						'identity',
    						'battle_dimension',
    						'status',
                            'sidc'
    					  ];
         
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
}
