<?php

namespace app\models;
use Yii;
use yii\base\Model;

class CategoriesModel extends Model
{
    public $title;
    public $description;
    public $img;

    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            ['img', 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'description' => 'Описание',
            'img' => 'Обложка'
        ];
    }
}