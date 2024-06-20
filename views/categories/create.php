<?php
/**
 * @var $model
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'description')->textarea() ?>
<?= $form->field($model, 'img')->fileInput() ?>
<?= Html::submitButton("Сохранить", ['class' => 'btn']) ?>
<?php ActiveForm::end() ?>
