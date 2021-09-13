<?php


namespace App\Controllers;


use App\Core\DB;
use App\Models\Catalog;

class CatalogController
{
    public function index(){
        $catalog = Catalog::search();
        render('catalog/index', [
            'catalog' => $catalog
        ]);
    }

    public function showProduct($id){
        $product = Catalog::finById($id);
        if(!$product){
            echo '404';
        }else{
            render('catalog/product_detail', compact('product'));
        }
    }

    public function addProduct(){
        render('catalog/add_product');
    }

    public function saveProduct(){
        $sql = "INSERT INTO products (name, price) VALUES ('{$_POST['name']}', '{$_POST['price']}')";
        DB::getConnection()->query($sql);
    }


}
