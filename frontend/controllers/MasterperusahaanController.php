<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Masterperusahaan;
use frontend\models\MasterperusahaanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * MasterperusahaanController implements the CRUD actions for Masterperusahaan model.
 */
class MasterperusahaanController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Masterperusahaan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MasterperusahaanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Masterperusahaan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Masterperusahaan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Masterperusahaan();

        if ($model->load(Yii::$app->request->post())) {

            $image1 = UploadedFile::getInstance($model, 'logo');
            $image2 = UploadedFile::getInstance($model, 'stamp');

            if(isset($image1->tempName)){
                $tmpfile_contents1 = file_get_contents( $image1->tempName );
                $pic1 = 'data:image/' . $image1->extension . ';base64,' . base64_encode($tmpfile_contents1);               
                $model->logo = $pic1;
            }

            if(isset($image2->tempName)){
                $tmpfile_contents2 = file_get_contents( $image2->tempName );
                $pic2 = 'data:image/' . $image2->extension . ';base64,' . base64_encode($tmpfile_contents2);               
                $model->stamp = $pic2;
            }

            $model->createdBy = Yii::$app->user->identity->username;
            $model->createdTime = date('Y-m-d H:i:s');
            $model->save(false);

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Masterperusahaan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            $modelx = $this->findModel($id);

            $image1 = UploadedFile::getInstance($model, 'logo');
            $image2 = UploadedFile::getInstance($model, 'stamp');

            if(isset($image1->tempName)){
                $tmpfile_contents1 = file_get_contents( $image1->tempName );
                $pic1 = 'data:image/' . $image1->extension . ';base64,' . base64_encode($tmpfile_contents1);               
                $model->logo = $pic1;
            }else{
                $model->logo = $modelx->logo;
            }
            if(isset($image2->tempName)){
                    $tmpfile_contents2 = file_get_contents( $image2->tempName );
                $pic2 = 'data:image/' . $image2->extension . ';base64,' . base64_encode($tmpfile_contents2);               
                $model->stamp = $pic2;
            }else{
                $model->stamp = $modelx->stamp;

            }
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Masterperusahaan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Masterperusahaan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Masterperusahaan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Masterperusahaan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
