<?php
/** @var $model ; */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="reg-form" style='height: 440px; margin-bottom: 70px;'>
    <div class="form__wrapper">
        <h1><?= $this->title ?></h1>
        <?php $form = ActiveForm::begin([
            'fieldConfig' => [
                'template' => "{label}\n{input}\n{error}",
                'labelOptions' => ['class' => 'label'],
                'inputOptions' => ['class' => 'input'],
                'errorOptions' => ['class' => 'error']
            ]
        ]) ?>

        <div>
            <?= $form->field($model, 'phone')->textInput() ?>
        </div>
        <div>
            <?= $form->field($model, 'password')->passwordInput() ?>
        </div>
        <div class="" style='flex-direction: row; gap: 10px; margin-bottom: 20px;'>Нет аккаунта? <a href="/user/registration">Зарегистрируйся!</a></div>
        <?= Html::submitButton('Login', ['class' => 'btn login-btn']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>