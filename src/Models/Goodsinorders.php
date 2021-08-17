<?php
declare(strict_types=1);

namespace Api\Models;

use Phalcon\Mvc\Model;
use Api\Models\Goods;
use Api\Models\Orders;

class Goodsinorders extends Model
{
    public $goods_id_gio;

    public $order_id_gio;

    public $count_goods_gio;

    public function initialize() {
        $this->belongsTo('goods_id_gio',Goods::class,'id_goods',[
            'alias' => 'goods'
        ]);

        $this->belongsTo('order_id_gio',Orders::class,'id_orders',[
            'alias' => 'orders'
        ]);
    }
}