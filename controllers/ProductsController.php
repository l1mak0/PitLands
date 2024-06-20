<?php

namespace app\controllers;

use app\entity\Products;
use app\models\CategoriesModel;
use app\repository\CategoryRepository;
use app\repository\ProductRepository;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\ProductsModel;

class ProductsController extends Controller
{
    public function actionIndex()
    {
        $this->view->title = 'Продукты';
        $products = ProductRepository::getAll();
        return $this->render('index', ['products' => $products]);
    }

    public function actionCreate()
    {
        $categories = CategoryRepository::getAllCategories();
        foreach ($categories as $category) {
            $category_list[$category->id] = $category->title;
        }
        $model = new ProductsModel();
        if ($model->load(\Yii::$app->request->post())) {
            $model->img = UploadedFile::getInstance($model, 'img');
            if ($model->validate()) {
                $productId = ProductRepository::createProduct(
                    $model->title,
                    $model->description,
                    $model->price,
                    $model->quantity,
                    $model->category_id,
                );
                if (!empty($model->img)) {
                    $file = $productId . '.jpg';
                    $model->img->saveAs("img/product/$file");
                }
                return $this->redirect('/products');
            };
        }
        return $this->render('create', [
            'model' => $model,
            'category' => $category_list,
        ]);
    }

    public function actionView($id)
    {
        $product = ProductRepository::getProduct($id);
        $category = CategoryRepository::getCategory($product->category_id);

        return $this->render('view', ['product' => $product, 'category' => $category]);
    }

    public function actionEdit($id)
    {
        $product = ProductRepository::getProduct($id);
        $categories = CategoryRepository::getAllCategories();
        foreach ($categories as $category) {
            $category_list[$category->id] = $category->title;
        }
        $model = new ProductsModel();

        if ($model->load(\Yii::$app->request->post())) {
            $model->img = UploadedFile::getInstance($model, 'img');
            if ($model->validate()) {
                ProductRepository::productUpdate(
                    $model->title,
                    $model->description,
                    $model->price,
                    $model->quantity,
                    $model->category_id,
                    $id
                );
                if (!empty($model->img)) {
                    $file = $id . '.jpg';
                    $model->img->saveAs("img/category/$file");
                }
                return $this->goBack();
            };
        }
        return $this->render('edit', [
            'model' => $model,
            'product' => $product,
            'category' => $category_list,
        ]);
    }

    public function actionDelete($id)
    {
        ProductRepository::deleteCProduct($id);
        return $this->render('index');
    }
}
