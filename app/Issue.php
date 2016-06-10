<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description','status','priority',
    ];


    /**
     * Get relation with author of issue
     */
    public function author(){
        return $this -> belongsTo('App\User');
    }


}
