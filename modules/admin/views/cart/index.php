<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Cart;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cart-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'label' => 'Product ID',
                'attribute' => 'product_id',
                'format' => 'raw',
                'value' => function (Cart $model) {
                    $product = $model->product;
                    return 'ID: ' . $product->id . '<br>' . $product->brand . ' / ' . $product->model . '<br>' . 'Color: ' . $product->color;
                }
            ],
            [
                'label' => 'User ID',
                'attribute' => 'user_id',
                'format' => 'raw',
                'value' => function (Cart $model) {
                    $user = $model->user;
                    return 'ID: ' . $user->id . '<br>' . $user->name . ' ' . $user->last_name . '<br>' . $user->email;
                }
            ],
            'count',
            'created_at',
            'updated_at',
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
