<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'status')->widget(Select2::className(), [
        'data' => $model->getStatus(),
        'options' => ['placeholder' => 'Select Status'],
    ]) ?>

    <?= $form->field($model, 'created_at')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'updated_at')->textInput(['disabled' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
