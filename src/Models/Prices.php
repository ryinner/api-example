<?php
declare(strict_types=1);

/**
 * This file is part of the Vökuró.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Api\Models;

use Phalcon\Mvc\Model;
use Api\Models\Goods;

class Prices extends Model
{
    public $id_prices;
    public $id_good_prices;
    public $value_prices;

    public function initialize()
    {
        $this->belongsTo('id_good_prices',Goods::class,'id_goods',[
            'alias' => 'goods'
        ]);
    }
}