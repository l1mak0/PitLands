<?php
/**
 * @var $model
 * @var $category
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'description')->textarea() ?>
<?= $form->field($model, 'price')->input('number', ['step' => '.01']) ?>
<?= $form->field($model, 'quantity')->input('number', ['step' => '1']) ?>
<?= $form->field($model, 'category_id')->dropDownList($category) ?>
<?= $form->field($model, 'img')->fileInput() ?>
<?= Html::submitButton("Сохранить", ['class' => 'btn']) ?>
<?php ActiveForm::end() ?>
