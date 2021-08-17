<?php
declare(strict_types=1);

namespace Api\Models;

use Phalcon\Mvc\Model;
use Api\Models\Categories;
use Api\Models\Parametrsgoods;
use Api\Models\Parametrsvalues;

class Parametrs extends Model
{
    public $id_par;
    public $name_par;
    public $id_cat_par;

    public function initialize()
    {
        $this->belongsTo('id_cat_par',Categories::class,'id',[
            'alias' => 'categories'
        ]);

        $this->hasMany('id_par',Parametrsgoods::class,'id_par_pg',[
            'alias' =>  'parametrsgoods'
        ]);

        $this->hasMany('id_par',Parametrsvalues::class,'id_par_pv',[
            'alias' =>  'parametrsvalues'
        ]);
    }
}