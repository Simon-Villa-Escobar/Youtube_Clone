<?php

/** @var $dataProvider \yii\data\ActiveDataProvider  */

use yii\widgets\ListView;

?>

<?php echo ListView::widget([
    "dataProvider"=> $dataProvider,
    'itemView' => '_video_item',
]);
?>