<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\models\ProductForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'article',
            'brand',
            'model',
            'price',
            'discountPrice',
            'gender',
            'description:ntext',
            'color',
            'created_at',
            'updated_at',
            [
                'label' => 'Images',
                'format' => 'raw',
                'attribute' => 'images',
                'value' => function (ProductForm $model) {
                    $result = '';
                    foreach ($model->images as $image) {
                        $result = $result . '<a target="_blank" href="'.$image.'">'.$image.'</a>,<br>';
                    }
                    return $result;
                }
            ]
        ],
    ]) ?>

</div>
