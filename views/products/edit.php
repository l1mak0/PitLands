<?php
/**
 * @var $model,
 * @var $product
 * @var $category
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'title')->textInput(['value' => $product->title]) ?>
<?= $form->field($model, 'description')->textarea(['value' => $product->description]) ?>
<?= $form->field($model, 'price')->textarea(['value' => $product->price]) ?>
<?= $form->field($model, 'quantity')->textarea(['value' => $product->quantity]) ?>
<?= $form->field($model, 'category_id')->dropDownList($category) ?>
<?= $form->field($model, 'img')->fileInput() ?>
<?= Html::submitButton("Сохранить", ['class' => 'btn']) ?>
<?php ActiveForm::end() ?>
