<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

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
            'email:email',
            'password_hash',
            'access_token',
            'created_at',
            'updated_at',
            'name',
            'last_name',
            'gender',
            'status',
            [
                'label' => 'Country',
                'format' => 'raw',
                'value' => function (User $model) {
                    if (!$model->address) {
                        return null;
                    }
                    return $model->address->country;
                }
            ],
            [
                'label' => 'City',
                'format' => 'raw',
                'value' => function (User $model) {
                    if (!$model->address) {
                        return null;
                    }
                    return $model->address->city;
                }
            ],
            [
                'label' => 'Address',
                'format' => 'raw',
                'value' => function (User $model) {
                    if (!$model->address) {
                        return null;
                    }
                    return $model->address->address;
                }
            ],
            [
                'label' => 'Phone Number',
                'format' => 'raw',
                'value' => function (User $model) {
                    if (!$model->address) {
                        return null;
                    }
                    return $model->address->phone_number;
                }
            ],
            [
                'label' => 'Postcode',
                'format' => 'raw',
                'value' => function (User $model) {
                    if (!$model->address) {
                        return null;
                    }
                    return $model->address->postcode;
                }
            ],
        ],
    ]) ?>

</div>
