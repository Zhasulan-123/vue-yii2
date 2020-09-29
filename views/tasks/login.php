<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Воити');;
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><?= Html::encode($this->title); ?></h3>
                    </div>
                    <?php $form = ActiveForm::begin(); ?>
                    <div class="card-body">
                        <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'placeholder' => 'E-mail']) ?>
                        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пороль']) ?>
                        <div class="form-check">
                            <?= $form->field($model, 'rememberMe')->checkbox([
                                'template' => "<div class=\"form-check-input\">{input} {label}</div>\n{error}",
                            ]) ?>
                        </div>
                    </div>
                    <br>
                    <div class="card-footer">
                        <?= Html::submitButton('Воити', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->