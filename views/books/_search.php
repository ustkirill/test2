<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Authors;

/* @var $this yii\web\View */
/* @var $model app\models\BooksSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<br>
<div class="books-search clearfix">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="col-xs-6">
        <div class="form-group">
            <div class="col-xs-6">
                <?= $form->field($model, 'author_id')->dropDownList(array_merge([0 => 'Выберите автора'], Authors::getItems()))->label(false) ?>
            </div>
            <div class="col-xs-6">
                <?= $form->field($model, 'name')->textInput(['placeholder' => $model->getAttributeLabel('name')])->label(false) ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12 align-fd-inputs">
                Дата выхода книги:
                <?= $form->field($model, 'date_start', ['template'=>'{input}'])->textInput(['class' => 'form-control datepicker'])->label(false) ?>
                до
                <?= $form->field($model, 'date_end', ['template'=>'{input}'])->textInput(['class' => 'form-control datepicker'])->label(false) ?>
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary pull-right']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<br>
