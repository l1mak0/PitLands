<?php

namespace app\entity;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $price
 * @property int $quantity
 * @property int $category_id
 */
class Products extends \yii\db\ActiveRecord
{

}
