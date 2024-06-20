<?php

use yii\db\Migration;

class m240619_150323_init extends Migration
{
    public function safeUp()
    {
        $this->createTable('users', [
            "id" => $this->primaryKey()->unique(),
            'name' => $this->string(50),
            'surname' => $this->string(75),
            'phone' => $this->string(11)->notNull(),
            'password' => $this->string()->notNull(),
            'birthday' => $this->date(),
        ]);
        $this->createTable('categories', [
            "id" => $this->primaryKey()->unique(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
        ]);
        $this->createTable('products', [
            "id" => $this->primaryKey()->unique(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'price' => $this->float()->notNull(),
            'quantity' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);
        $this->createTable('sale_card', [
            "id" => $this->primaryKey()->unique(),
            'user_id' => $this->integer()->notNull(),
            'number' => $this->integer()->notNull(),
            'balance' => $this->integer()->notNull(),
            'date' => $this->date(),
        ]);
        $this->createTable('basket', [
            "id" => $this->primaryKey()->unique(),
            'user_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'basket_to_user_fk',
            'basket',
            'user_id',
            'users',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'sale_card_to_user_fk',
            'sale_card',
            'user_id',
            'users',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'basket_to_product_fk',
            'basket',
            'product_id',
            'products',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'products_to_categories_fk',
            'products',
            'category_id',
            'categories',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('categories');
        $this->dropTable('products');
        $this->dropTable('users');
        $this->dropTable('sale_card');
        $this->dropTable('basket');
    }

}
