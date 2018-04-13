<?php

namespace SimulatorOperation;

use Illuminate\Database\Eloquent\Model;

class Cabin extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cabins';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Indicates if the model should incrementing in false.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [	'id',
    						'name',
    						'ip_address_arduino',
    						'mac_address_arduino',
							'ip_address_camera',
                            'port_camera'];
                            
	public function computers()
    {
        return $this->hasMany('SimulatorOperation\Computer');
    }

    public function stages(){
        return $this->belongsToMany('SimulatorOperation\Stage');
    }

    public function units(){
        return $this->belongsToMany('SimulatorOperation\Unit');
    }

    public function getNumComputersAttribute(){
        return count($this->computers);
    }

    public function getComputersAllAttribute(){
        return $this->computers;
    }



}
