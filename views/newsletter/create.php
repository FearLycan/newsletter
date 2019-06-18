<?php

use app\models\Newsletter;
use yii\helpers\Html;
use yii\web\View;


/* @var $this yii\web\View */
/* @var $model Newsletter */

$this->title = 'Create Newsletter';
$this->params['breadcrumbs'][] = ['label' => 'Newsletter', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newsletter-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>