<?php

/* @var $this yii\web\View */

$this->title = 'Товары';
?>
<div id="app">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="m-0 text-dark"><?= Yii::t('app', 'Товары'); ?></h1>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group">
                                <button type="button" @click="sortLowest" class="btn btn-default">
                                    <?= Yii::t('app', 'Цена больше'); ?>
                                </button>
                                <button type="button" @click="sortHighest" class="btn btn-default">
                                    <?= Yii::t('app', 'Цена менше'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <div class="breadcrumb float-sm-right">
                        <form class="form-inline ml-3">
                            <div class="input-group input-group-sm">
                                <input v-model="search" class="form-control form-control-navbar" type="search" placeholder="<?= Yii::t('app', 'Поиск'); ?>" aria-label="Search">
                                <div class="input-group-append">
                                    <div class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-3" v-for="(item, index) in searcheForm" :key="index">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title m-0">{{item.name}}</h5>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title"><?= Yii::t('app', 'Цена'); ?>:&nbsp;{{item.price}}&nbsp;тг</h6>

                                    <p class="card-text"><?= Yii::t('app', 'Описание'); ?>:&nbsp;{{item.desc}}</p>
                                    <button type="button" class="btn btn-primary" @click="viewSelected(item.id)"><?= Yii::t('app', 'Просмотр'); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <div class="modal fade" id="modal-lg-view">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= Yii::t('app', 'Товар'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th><?= Yii::t('app', 'Название:'); ?></th>
                                        <th>{{viewItem.name}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= Yii::t('app', 'Цена:'); ?></td>
                                        <td>{{viewItem.price}}&nbsp;тг</td>
                                    </tr>
                                    <tr>
                                        <td><?= Yii::t('app', 'Описание:'); ?></td>
                                        <td>{{viewItem.desc}}</td>
                                    </tr>
                                    <tr>
                                        <td><?= Yii::t('app', 'Дата создание:'); ?></td>
                                        <td>{{viewItem.created_at}}</td>
                                    </tr>
                                    <tr>
                                        <td><?= Yii::t('app', 'Дата изменение:'); ?></td>
                                        <td>{{viewItem.updated_at}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?= Yii::t('app', 'Закрыть'); ?></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <?php $this->registerJsFile('@web/js/script.js', ['depends' => 'app\assets\AppAsset']); ?>