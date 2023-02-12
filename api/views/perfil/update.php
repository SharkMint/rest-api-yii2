<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var api\modules\v1\models\Perfil $model */

$this->title = 'Update Perfil: ' . $model->idperfil;
$this->params['breadcrumbs'][] = ['label' => 'Perfils', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idperfil, 'url' => ['view', 'idperfil' => $model->idperfil]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perfil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
