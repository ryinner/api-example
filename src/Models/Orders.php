<?php
declare(strict_types=1);

namespace Api\Models;

use Phalcon\Mvc\Model;

class Orders extends Model
{
    public $id_orders;
    
    public $tel_orders;
    
    public $adress_orders;
    
    public $name_orders;
}