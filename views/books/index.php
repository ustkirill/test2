<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\TimeHelper;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Книги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить книгу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            'id',
            'name',
            [
                'attribute' => 'preview',
                'content' => function ($data) {
                    return Html::a(Html::img($data->preview, ['width' => '50']), [$data->preview], ['class' => 'fancybox']);
                }
            ],
            [
                'attribute' => 'date',
                'content' => function ($data) {
                    return TimeHelper::create(date('Y-m-d h:i:s', strtotime($data->date)))->today();
                }
            ],
            [
                'attribute' => 'author_id',
                'content' => function ($data) {
                    return $data->author->fullname;
                }
            ],
            [
                'attribute' => 'date_create',
                'content' => function ($data) {
                    return TimeHelper::create(date('Y-m-d h:i:s', strtotime($data->date_create)))->today();
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                    'template'=>'{update}<br>{view}<br>{delete}',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        if (count(Yii::$app->request->get()) > 0)
                            $url = $url . '?' . explode('?', Yii::$app->request->getAbsoluteUrl())[1];

                        return Html::a('Редактировать',  $url, ['target' => '_blank']);
                    },
                    'view' => function ($url, $model, $key) {
                        return Html::a('Информация', $url, ['class' => 'show-modal']);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('Удалить', $url);
                    },
                ],
            ],
        ],
    ]); ?>

</div>
