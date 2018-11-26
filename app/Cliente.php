<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'cliente';
    
    protected $fillable = [
          'cliente_nombre_completo',
          'cliente_direccion',
          'cliente_nit'
    ];
    

    public static function boot()
    {
        parent::boot();

        Cliente::observe(new UserActionsObserver);
    }
    
    
    
    
}