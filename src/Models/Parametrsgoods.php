<?php
declare(strict_types=1);

namespace Api\Models;

use Phalcon\Mvc\Model;
use Api\Models\Goods;
use Api\Models\Parametrs;
use Api\Models\Parametrsvalues;

class Parametrsgoods extends Model
{
    public $id_pg;
    public $id_good_pg;
    public $id_val_pg;
    public $id_par_pg;

    public function initialize()
    {
        $this->belongsTo('id_good_pg',Goods::class,'id_goods',[
            'alias' =>  'goods'
        ]);

        $this->belongsTo('id_par_pg',Parametrs::class,'id_par',[
            'alias' =>  'parametrs'
        ]);

        $this->belongsTo('id_val_pg',Parametrsvalues::class,'id_pv',[
            'alias' =>  'parametrsvalues'
        ]);
    }
}