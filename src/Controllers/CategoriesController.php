<?php

namespace Api\Controllers;


use Api\Models\Categories;
use Api\Models\Goods;
use Phalcon\Paginator\Adapter\QueryBuilder as Paginator;
use PDO;

class CategoriesController extends ControllerBase
{
    public function index()
    {
        header("Access-Control-Allow-Origin: http://vokuro.local");
        $category = Categories::find();
        echo json_encode($category);
    }

    public function goods($id)
    {
        $builder = $this->modelsManager->createBuilder()->columns('id_goods, title_goods, photo_goods')
            ->from(Goods::class)
            ->where('id_cat_goods = :idcat:', ['idcat' => $id], [PDO::PARAM_INT]);
        $paginator = new Paginator([
            'builder'  => $builder,
            'limit' => 12,
            'page'  => $this->request->getQuery('page', 'int', 1),
        ]);
        echo json_encode($paginator->paginate());
    }
}