<?php
/**
 * User: TheCodeholic
 * Date: 4/18/2020
 * Time: 8:48 AM
 */


use yii\helpers\Html;


use yii\helpers\Url;

/** @var $this \yii\web\View */
/** @var $model \common\models\Video */
/** @var $similarVideos \common\models\Video[] */
/** @var $comments \common\models\Comment[] */

$this->title = $model->title . ' | ' . Yii::$app->name;
?>
<div class="row">
    <div class="col-sm-8">
        <div class="embed-responsive embed-responsive-16by9">
            <video class="embed-responsive-item"
                   poster="<?php echo $model->getThumbnailLink() ?>"
                   src="<?php echo $model->getVideoLink() ?>"
                   controls></video>
        </div>
        <h6 class="mt-2"><?php echo $model->title ?></h6>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <?php echo $model->getViews()->count() ?> views •
                <?php echo Yii::$app->formatter->asDate($model->created_at) ?>
            </div>
            <div>
                <?php \yii\widgets\Pjax::begin() ?>
                <?php echo $this->render('_buttons', [
                    'model' => $model
                ]) ?>
                <?php \yii\widgets\Pjax::end() ?>
            </div>
        </div>
        <div>
            <p>
                <?php echo \common\helpers\Html::channelLink($model->createdBy) ?>
            </p>
            <?php echo Html::encode($model->description) ?>
            
        </div>
    </div>
</div>
        
