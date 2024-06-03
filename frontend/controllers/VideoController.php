<?php

namespace frontend\controllers;

use common\models\Video;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class VideoController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
        'query' => Video::find()
        ->published()
        ->latest()
        ]);

        return $this->render("index", [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionView($id)
    {
        $this->layout = 'auth';
        $video = Video::findOne($id);
        if (!$video){
            throw new NotFoundHttpException('Video not found');
        }
        return $this->render('view', [
            'model' => $video
        ]);
    }
    
}