<?php
/**
 * @var $model,
 * @var $category
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'title')->textInput(['value' => $category->title]) ?>
<?= $form->field($model, 'description')->textarea(['value' => $category->description]) ?>
<?= $form->field($model, 'img')->fileInput() ?>
<?= Html::submitButton("Сохранить", ['class' => 'btn']) ?>
<?php ActiveForm::end() ?>
