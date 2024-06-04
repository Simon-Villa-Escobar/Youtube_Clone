<?php

/** @var $model \common\models\Video */

use yii\helpers\Url;
use common\models\VideoLike;
use common\models\Video;

$userId = Yii::$app->user->id;
$videoId = $model->video_id;
$hasLiked = VideoLike::isLikedBy($userId, $videoId);
$hasDisliked = VideoLike::isDislikedBy($userId, $videoId);

?>

<a href="#" class="btn btn-sm <?php echo $hasLiked ? 'btn-outline-primary' : 'btn-outline-secondary' ?> like-button"
    data-url="<?php echo Url::to(['/video/like', 'id' => $videoId]) ?>"
    data-pjax="1">
    <i class="fas fa-thumbs-up"></i> <span class="like-count"><?php echo $model->getLikes()->count() ?></span>
</a>

<a href="#" class="btn btn-sm <?php echo $hasDisliked ? 'btn-outline-primary' : 'btn-outline-secondary' ?> dislike-button"
    data-url="<?php echo Url::to(['/video/dislike', 'id' => $videoId]) ?>"
    data-pjax="1">
    <i class="fas fa-thumbs-down"></i> <span class="dislike-count"><?php echo $model->getDislikes()->count() ?></span>
</a>

<?php
$this->registerJs('
    $(document).on("click", ".like-button, .dislike-button", function(e){
        e.preventDefault();
        var button = $(this);
        var isLikeButton = button.hasClass("like-button");
        var url = button.data("url");

        $.ajax({
            url: url,
            type: "POST",
            success: function(response){
                var likeButton = $(".like-button");
                var dislikeButton = $(".dislike-button");

                var likeCount = parseInt(likeButton.find(".like-count").text(), 10);
                var dislikeCount = parseInt(dislikeButton.find(".dislike-count").text(), 10);

                // Actualizar estados de botones y contadores
                if (isLikeButton) {
                    if (button.hasClass("btn-outline-primary")) {
                        likeButton.removeClass("btn-outline-primary").addClass("btn-outline-secondary");
                        likeCount--;
                    } else {
                        likeButton.removeClass("btn-outline-secondary").addClass("btn-outline-primary");
                        likeCount++;
                        if (dislikeButton.hasClass("btn-outline-primary")) {
                            dislikeButton.removeClass("btn-outline-primary").addClass("btn-outline-secondary");
                            dislikeCount--;
                        }
                    }
                } else {
                    if (button.hasClass("btn-outline-primary")) {
                        dislikeButton.removeClass("btn-outline-primary").addClass("btn-outline-secondary");
                        dislikeCount--;
                    } else {
                        dislikeButton.removeClass("btn-outline-secondary").addClass("btn-outline-primary");
                        dislikeCount++;
                        if (likeButton.hasClass("btn-outline-primary")) {
                            likeButton.removeClass("btn-outline-primary").addClass("btn-outline-secondary");
                            likeCount--;
                        }
                    }
                }

                likeButton.find(".like-count").text(likeCount);
                dislikeButton.find(".dislike-count").text(dislikeCount);

                $.pjax.reload({container: "#your-pjax-container"});
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
');
?>
