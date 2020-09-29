<?php

/* @var $this yii\web\View */

$this->title = 'Администратор';
?>
<!-- Content Header (Page header) -->
<div id="app">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <?= Yii::t('app', 'Товары'); ?>
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a @click="modalProduct" style="color: #fff; cursor: pointer;" class="btn btn-block btn-success"><?= Yii::t('app', 'Добавить'); ?></a>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?= Yii::t('app', 'Списки товары'); ?></h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="search" v-model="search" class="form-control float-right" placeholder="<?= Yii::t('app', 'Поиск'); ?>">

                                    <div class="input-group-append">
                                        <p class="btn btn-default"><i class="fas fa-search"></i></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th><?= Yii::t('app', '№'); ?></th>
                                        <th><?= Yii::t('app', 'Название'); ?></th>
                                        <th><?= Yii::t('app', 'Цена'); ?></th>
                                        <th><?= Yii::t('app', 'Описание'); ?></th>
                                        <th><?= Yii::t('app', 'Статус'); ?></th>
                                        <th><?= Yii::t('app', 'Дата создание'); ?></th>
                                        <th><?= Yii::t('app', 'Дата обновление'); ?></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in searcheForm" :key="index">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{item.name}}</td>
                                        <td>{{item.price}}</td>
                                        <td>{{item.desc}}</td>
                                        <td v-if="!item.is_published">
                                            <span class="badge bg-danger">
                                                <?= Yii::t('app', 'Не опубликовано'); ?>
                                            </span>
                                        </td>
                                        <td v-else>
                                            <span class="badge bg-success">
                                                <?= Yii::t('app', 'Опубликовано'); ?>
                                            </span>
                                        </td>
                                        <td>{{item.created_at}} </td>
                                        <td>{{item.updated_at}}</td>
                                        <td>
                                            <button type="button" @click="editForm(item.id)" class="btn btn-danger btn-sm"><i class="fas fa-sync-alt"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form @submit.prevent="addProduct" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title"><?= Yii::t('app', 'Добавить товар'); ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputName"><?= Yii::t('app', 'Название'); ?></label>
                                <input type="text" v-model="newProduct.name" class="form-control" id="exampleInputName" placeholder="<?= Yii::t('app', 'Название'); ?>">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPrice"><?= Yii::t('app', 'Цена'); ?></label>
                                        <input type="text" v-model="newProduct.price" class="form-control" id="exampleInputPrice" placeholder="<?= Yii::t('app', 'Цена'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?= Yii::t('app', 'Статус'); ?></label>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" v-model="newProduct.is_published" type="checkbox" id="customCheckbox1" value="option1">
                                            <label for="customCheckbox1" class="custom-control-label"><?= Yii::t('app', 'Опубликовать'); ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputDescription"><?= Yii::t('app', 'Описание'); ?></label>
                                <textarea class="form-control" v-model="newProduct.desc" id="exampleInputDescription" rows="3" placeholder="<?= Yii::t('app', 'Описание'); ?>"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?= Yii::t('app', 'Закрыть'); ?></button>
                        <button type="submit" class="btn btn-primary">
                            <?= Yii::t('app', 'Добавить'); ?>
                        </button>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="modal fade" id="modal-lg-update">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form @submit.prevent="updateProduct" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title"><?= Yii::t('app', 'Обновить товар'); ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputName"><?= Yii::t('app', 'Название'); ?></label>
                                <input type="text" v-model="newProduct.name" class="form-control" id="exampleInputName" placeholder="<?= Yii::t('app', 'Название'); ?>">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPrice"><?= Yii::t('app', 'Цена'); ?></label>
                                        <input type="text" v-model="newProduct.price" class="form-control" id="exampleInputPrice" placeholder="<?= Yii::t('app', 'Цена'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?= Yii::t('app', 'Статус'); ?></label>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" v-model="newProduct.is_published" type="checkbox" id="customCheckbox1" value="option1">
                                            <label for="customCheckbox1" class="custom-control-label"><?= Yii::t('app', 'Опубликовать'); ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputDescription"><?= Yii::t('app', 'Описание'); ?></label>
                                <textarea class="form-control" v-model="newProduct.desc" id="exampleInputDescription" rows="3" placeholder="<?= Yii::t('app', 'Описание'); ?>"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?= Yii::t('app', 'Закрыть'); ?></button>
                        <button type="submit" class="btn btn-warning" @click="updateProduct(newProduct.id)">
                            <?= Yii::t('app', 'Обнавить'); ?>
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
<?php $this->registerJsFile('@web/js/sctiptAdmin.js', ['depends' => 'app\assets\AdminAsset']) ?>