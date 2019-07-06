<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-primary">
    <div class="card-header">
        <h4>Login</h4>
    </div>
    <div class="card-body">
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username') ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div style="color:#999;margin:1em 0">
            If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
        </div>



        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>