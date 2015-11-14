<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Authors;

/* @var $this yii\web\View */
/* @var $model app\models\Books */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preview')->fileInput() ?>

    <?= $form->field($model, 'date')->textInput(['class' => 'form-control datepicker']) ?>

    <?= $form->field($model, 'author_id')->dropDownList(Authors::getItems()) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
