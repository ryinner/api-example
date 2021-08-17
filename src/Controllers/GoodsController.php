<?php

namespace Api\Controllers;


use Api\Models\Goods;
use Api\Models\Parametrs;
use Api\Models\Parametrsgoods;
use Api\Models\Parametrsvalues;
use Api\Models\Prices;
use PDO;

class GoodsController extends ControllerBase
{
    public function good($id)
    {
        $json['goods'] = Goods::findFirst($id);
        $json['categoryBrands'] = $this->categoryBrands($id);
        $json['param'] = $this->params($id);
        $json['prices'] = $this->prices($id);

        echo json_encode($json);
    }

    public function categoryBrands($id)
    {
        $categoryBrands['category'] = Goods::findFirst($id)->categories->cat_name;;
        $categoryBrands['brand'] = Goods::findFirst($id)->brands->name_brands;
        return $categoryBrands;
    }

    public function params($id)
    {
        $param = $this->modelsManager->createBuilder()
            ->columns("v.val_pv,p.name_par")
            ->from(['pg' => Parametrsgoods::class])
            ->join(
                Parametrs::class,
                'pg.id_par_pg = p.id_par',
                'p',
                'LEFT'
            )
            ->join(
                Parametrsvalues::class,
                'v.id_pv=pg.id_par_pg',
                'v',
                'LEFT'
            )
            ->where("id_good_pg= :id:", ["id" => $id], ["id" => PDO::PARAM_INT])
            ->getQuery()
            ->execute();
        return $param;
    }

    public function prices($id)
    {
        return Prices::find("id_good_prices = $id");
    }
}