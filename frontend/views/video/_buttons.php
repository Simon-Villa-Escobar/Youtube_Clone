<?php

/** @var $model \common\models\Video */

use yii\helpers\Url;
use common\models\VideoLike;
use common\models\Video;

$userId = Yii::$app->user->id;
$videoId = $model->video_id;
$hasLiked = VideoLike::isLikedBy($userId, $videoId);

?>

<a href="#" class="btn btn-sm <?php echo $hasLiked ? 'btn-outline-primary' : 'btn-outline-secondary' ?> like-button"
    data-url="<?php echo Url::to(['/video/like', 'id' => $videoId]) ?>"
    data-pjax="1">
    <i class="fas fa-thumbs-up"></i>
</a>

<?php
// Registro de JavaScript para manejar la solicitud POST
$this->registerJs('
    $(document).on("click", ".like-button", function(e){
        e.preventDefault();
        var button = $(this);
        var url = button.data("url");
        var isLiked = button.hasClass("btn-outline-primary");
        
        $.ajax({
            url: url,
            type: "POST",
            success: function(response){
                // Si se dio like, cambia a azul; de lo contrario, a secundario
                if (isLiked) {
                    button.removeClass("btn-outline-primary").addClass("btn-outline-secondary");
                } else {
                    button.removeClass("btn-outline-secondary").addClass("btn-outline-primary");
                }
                $.pjax.reload({container: "#your-pjax-container"});
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
');
?>
