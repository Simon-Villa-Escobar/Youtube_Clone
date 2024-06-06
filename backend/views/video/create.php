<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
use app\models\FormUpload;

/** @var yii\web\View $this */
/** @var common\models\Video $model */

$this->title = 'Create Video';
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="video-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="d-flex flex-column justify-content-center align-items-center">
        <div class="upload-icon mb-3">
            <i class="fa fa-upload fa-3x"></i>     
        </div>

        <p class="m-0">
            Drag and drop a file you want to upload
        </p>
        <p class="text-muted mb-4">Your video will be private until you publish it</p>

        <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'],
        ]) ?>

            <div class="form-group">
                <label for="videoFile" class="btn btn-primary btn-file">
                    Select File
                    <?= $form->field($model, 'video', [
                        'template' => '{input}',
                        'options' => ['tag' => false],
                    ])->fileInput(['class' => 'd-none', 'id' => 'videoFile', 'accept' => 'video/mp4']) ?>
                </label>
                <span id="selectedFileName" class="text-muted"></span>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Upload', ['class' => 'btn btn-success']) ?>
            </div>

        <?php ActiveForm::end() ?>

    </div>

</div>

<?php
$script = <<< JS
document.getElementById('videoFile').addEventListener('change', function() {
    var fileName = this.files[0].name;
    document.getElementById('selectedFileName').textContent = fileName;
});
JS;
$this->registerJs($script);
?>