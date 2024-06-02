<?php

namespace backend\controllers;

use Yii;
use common\models\Video;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\FormUpload;

/**
 * VideoController implements the CRUD actions for Video model.
 */
class VideoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Video models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Video::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'video_id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Video model.
     * @param string $video_id Video ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Video model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


     public function actionCreate()
     {
         $model = new Video();
     
         if (Yii::$app->request->isPost) {
             // Obtener el archivo subido
             $model->video = UploadedFile::getInstance($model, 'video');
     
             // Intentar guardar el modelo
             if ($model->save()) {
                return $this->redirect(['update', 'id' => $model->video_id]);
             }
         }
     
         return $this->render('create', [
             'model' => $model,
         ]);
     }
     

// public function actionCreate()
//     {
//         $model = new Video();

//         if (Yii::$app->request->isPost) {
//             $model->video = UploadedFile::getInstance($model,'video');
//             if ($model->upload()) {
//                 echo "bien";
//                 return;
//             }
//         }
//     } 







//     public function actionCreate()
// {
//     $model = new Video();

//     if (Yii::$app->request->isPost) {
//         $model->load(Yii::$app->request->post());
//         $model->video = UploadedFile::getInstance($model, 'video');

//         // Verificar si los datos del modelo son válidos
//         if ($model->validate()) {
//             // Los datos son válidos, ahora intenta guardar el modelo
//             if ($model->save()) {
//                 // El modelo se ha guardado correctamente
//                 return $this->redirect(['update', 'id' => $model->video_id]);
//             }
//         } else {
//             // Hay errores de validación, puedes mostrarlos si lo deseas
//             $errors = $model->errors;
//             // Por ejemplo, puedes imprimir los errores en la vista
//             print_r($errors);
//         }
//     }

//     return $this->render('create', [
//         'model' => $model,
//     ]);
// }

    /**
     * Updates an existing Video model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $video_id Video ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionUpdate($video_id)
    // {
    //     $model = $this->findModel($video_id);

    //     if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
    //         return $this->redirect(['update', 'id' => $model->video_id]);
    //     }

    //     return $this->render('update', [
    //         'model' => $model,
    //     ]);
    // }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        $model->thumbnail = UploadedFile::getInstanceByName('thumbnail');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->video_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Video model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $video_id Video ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Video model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $video_id Video ID
     * @return Video the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Video::findOne(['video_id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
