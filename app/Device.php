<?php

namespace SimulatorOperation;

use Illuminate\Database\Eloquent\Model;
use Lang;

class Device extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'devices';

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
    						'ip_address',
    						'description',
    						'label',
    						'device_type_id',
                            'computer_id',
                            'switch_port'
    					  ];
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];


    public function deviceType()
    {
        return $this->belongsTo('SimulatorOperation\DeviceType','device_type_id','id');
    }

    /**
     * Get the computer that owns the device.
     */
    public function computer()
    {
        return $this->belongsTo('SimulatorOperation\Computer','computer_id','id');
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute(){
        //return "{$this->name} - {$this->ip_address} - {$this->label} ({$this->deviceType->name})\n";
        $fullName = "\n {$this->name} - {$this->ip_address} - {$this->label} ({$this->deviceType->name}) \n";
         return $fullName.(isset($this->computer) ? ' -> '.$this->computer->name : ' -> '.Lang::get('messages.unassigned'));
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getNameTabAttribute(){
        return "\t {$this->name} \n";
    }
}
