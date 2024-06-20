<?php

namespace app\entity;
use app\repository\UserRepository;
use app\entity\SaleCard;
use app\entity\Reserves;
use app\entity\Orders;
/**
 * @property integer id
 * @property string phone
 * @property string password
 * @property string name
 * @property string surname
 * @property string burthday
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public static function findIdentity($id)
    {
        return new static(UserRepository::getUserById($id));
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        
    }


    public function getId()
    {
        return $this->id;
    }

    public function validatePassword($password){
        return password_verify($password, $this->password);
    }

    public function findUserByPhone($phone){
        return new static(UserRepository::getUserByPhone($phone));
    }

    public function getSaleCard()
    {
        return $this->hasOne(saleCard::class, ['user_id' => 'id']);
    }

    
    
    public function getAuthKey(){}
    public function validateAuthKey($authKey){}
}