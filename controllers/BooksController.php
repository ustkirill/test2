<?php

namespace app\controllers;

use Yii;
use app\models\Books;
use app\models\BooksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * BooksController implements the CRUD actions for Books model.
 */
class BooksController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

	/**
	 * Lists all Books models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new BooksSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single Books model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		$layout = Yii::$app->request->get('layout');

		if ($layout == 'modal')
			$this->layout = $layout;

		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new Books model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Books();

		$dir = Yii::getAlias('@uploads');

		if ($model->load(Yii::$app->request->post())) {
			$model->date_create = date('Y-m-d');
			$model->date_update = date('Y-m-d');

			$model->preview = UploadedFile::getInstance($model, 'preview');
			if ($model->preview && $model->validate()) { 
				$path = $dir . '/' . $model->generateUniqueFilename() . '.' . $model->preview->extension;
				$model->preview->saveAs($path);
				$model->preview = $path;
			}

			if ($model->save()) {
				return $this->redirect(['view', 'id' => $model->id]);
			}
		}

		return $this->render('create', [
			'model' => $model,
		]);
	}

	/**
	 * Updates an existing Books model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		$preview = $model->preview;

		$dir = Yii::getAlias('@uploads');

		if ($model->load(Yii::$app->request->post())) {

			$model->date_update = date('Y-m-d');

			$model->preview = UploadedFile::getInstance($model, 'preview');
			if ($model->preview && $model->validate()) { 
				$path = $dir . '/' . $model->generateUniqueFilename() . '.' . $model->preview->extension;
				$model->preview->saveAs($path);
				$model->preview = $path;
				unlink($preview);
			} else {
				$model->preview = $preview;
			}

			if ($model->save()) {
				$url = 'index';
				if (count(Yii::$app->request->get()) > 1)
					$url = 'index' . '?' . explode('?', Yii::$app->request->getAbsoluteUrl())[1];
				return $this->redirect([$url]);
			}
		}

		return $this->render('update', [
			'model' => $model,
		]);
	}

	/**
	 * Deletes an existing Books model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$model = $this->findModel($id);
		unlink($model->preview);
		$model->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the Books model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Books the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Books::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
