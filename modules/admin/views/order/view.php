<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Order;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'User ID',
                'attribute' => 'user_id',
                'format' => 'raw',
                'value' => function (Order $model) {
                    $user = $model->user;
                    return 'ID: ' . $user->id . '<br>' . $user->name . ' ' . $user->last_name . '<br>' . $user->email;
                }
            ],
            'status',
            'card_number',
            'created_at',
            'updated_at',
            [
                'label' => 'Products',
                'format' => 'raw',
                'value' => function (Order $model) {
                    $result = '';
                    foreach ($model->products as $product) {
                        $result = $result . 'ID: ' .  $product->product->id . '<br>Brand: ' . $product->product->brand . '<br>Model: ' . $product->product->model . '<br>Count: ' . $product->count . '<br>';
                    }
                    return $result;
                }
            ]
        ],
    ]) ?>

</div>
