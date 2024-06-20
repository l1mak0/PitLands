<?php

namespace app\repository;
use app\entity\Categories;
class CategoryRepository
{

    public static function getAllCategories()
    {
        return Categories::find()->all();
    }
    public static function getCategory($id)
    {
        return Categories::find()->where(["id" => $id])->one();
    }

    public static function createNewCategory($title, $description)
    {
        $category = new Categories();
        $category->title = $title;
        $category->description = $description;
        $category->save();
        return $category->id;
    }

    public static function categoryUpdate($title, $description, $id)
    {
        $category = Categories::find()->where(["id" => $id])->one();
        $category->title = $title;
        $category->description = $description;
        $category->update();
    }

    public static function deleteCategory($id)
    {
        $category = Categories::find()->where(["id" => $id])->one();
        $category->delete();
    }
}