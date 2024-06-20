<?php

namespace app\controllers;

use app\models\CategoriesModel;
use app\repository\CategoryRepository;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;

class CategoriesController extends Controller
{
    public function actionIndex()
    {
        $this->view->title = "Все категории";
        $categories = CategoryRepository::getAllCategories();
        return $this->render('index', ['categories' => $categories]);
    }

    public function actionView($id)
    {
        $category = CategoryRepository::getCategory($id);
        return $this->render('view', ['category' => $category]);
    }

    public function actionCreate()
    {
        $model = new CategoriesModel();

        if ($model->load(\Yii::$app->request->post())) {
            $model->img = UploadedFile::getInstance($model, 'img');
            if ($model->validate()) {
                $categoryId = CategoryRepository::createNewCategory(
                    $model->title,
                    $model->description,
                );
                if (!empty($model->img)) {
                    $file = $categoryId . '.jpg';
                    $model->img->saveAs("img/category/$file");
                }
                return $this->goBack();
            };
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionEdit($id)
    {
        $category = CategoryRepository::getCategory($id);
        $model = new CategoriesModel();

        if ($model->load(\Yii::$app->request->post())) {
            $model->img = UploadedFile::getInstance($model, 'img');
            if ($model->validate()) {
                CategoryRepository::categoryUpdate(
                    $model->title,
                    $model->description,
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
            'category' => $category,
        ]);
    }

    public function actionDelete($id)
    {
        CategoryRepository::deleteCategory($id);
        return $this->render('index');
    }
}