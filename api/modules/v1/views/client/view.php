<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var api\modules\v1\models\Client $model */

$this->title = $model->idclient;
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="client-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idclient' => $model->idclient], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idclient' => $model->idclient], [
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
            'idclient',
            'firstname',
            'lastname',
            'email:email',
            'phone',
            'city',
            'state',
            'zipcode',
            'country',
            'created_ad',
        ],
    ]) ?>

</div>
