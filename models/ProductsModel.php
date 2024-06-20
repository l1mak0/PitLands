<?php

namespace app\models;
use app\entity\Categories;
use app\entity\Products;
use yii\base\Model;
use Yii;

class ProductsModel extends Model
{
    public $title;
    public $description;
    public $price;
    public $quantity;
    public $category_id;
    public $img;

    public function rules()
    {
        return [
            [['title', 'description', 'price', 'quantity', 'category_id'], 'required'],
            [['quantity', 'category_id'], 'integer'],
            [['price'], 'double'],
            ['img', 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название продукта',
            'description' => 'Описание продукта',
            'price' => 'Цена',
            'quantity' => 'Количество',
            'category_id' => 'Выберите категорию',
            'img' => "Обложка"
        ];
    }
}