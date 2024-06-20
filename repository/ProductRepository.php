<?php

namespace app\repository;
use app\entity\Categories;
use app\entity\Products;

class ProductRepository
{
    public static function getAll()
    {
        return Products::find()->all();
    }

    public static function createProduct($title, $description, $price, $quantity, $category_id)
    {
        $products = new Products();
        $products->title = $title;
        $products->description = $description;
        $products->price = $price;
        $products->quantity = $quantity;
        $products->category_id = $category_id;
        $products->save();
        return $products->id;
    }

    public static function getProduct($id)
    {
        return Products::findOne($id);
    }

    public static function productUpdate($title, $description, $price, $quantity, $category_id, $id)
    {
        $products = self::getProduct($id);
        $products->title = $title;
        $products->description = $description;
        $products->price = $price;
        $products->quantity = $quantity;
        $products->category_id = $category_id;
        $products->update();

    }
    public static function deleteCProduct($id)
    {
        $category = self::getProduct($id);
        $category->delete();
    }

}