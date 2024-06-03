<?php

/** @var $model common\models\Video */
?>

<div class="card mb-3" style="width: 18rem;">
    <div class="embed-responsive embed-responsive-16by9 mb-3">
        <video class="embed-responsive-item" 
            poster = "<?php echo $model->getThumbnailLink() ?>"
            src="<?php echo $model->getVideoLink() ?>">
        </v>
    </div>
    <div class="card-body">
        <h5 class="card-title"><?php echo $model->title ?></h5>
        <p class="card-text">
            <?php echo $model->createdBy->username ?> 
        </p>
        <p class="card-text">
            140 views   .  
            <?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?>
        </p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>