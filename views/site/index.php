<?php

/* @var $this yii\web\View */

$this->title = 'Vacation App';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1> Отпуска 2021 </h1>
    </div>

    <div class="body-content">

        <div class="row">

            <div class="col-lg-12">

                Авторизуйтесь под любым из пользователей что бы получить возможность редактировать данные! <br>
                Учетные данные работников <strong>ivanov/ivanov</strong> <strong>petrov/petrov</strong> <strong>sidorov/sidorov</strong> <br>
                Учетные данные руководителя <strong>boss/boss</strong> <br>

                <h4>
                    <?= Yii::$app->user->isGuest ? 'User: Not authorized' : 'User: '.Yii::$app->user->identity->username ?>
                </h4>
                <br>
            </div>
            <div class="col-lg-12">
                <?php if( !empty($dbUsers) ): ?>

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя пользователя</th>
                            <th>Начало отпуска</th>
                            <th>Конец отпуска</th>
                            <th>Утверждено</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i=0; ?>

                        <?php foreach($dbUsers as $user): ?>
                            <?php $i++; ?>
                            <tr>
                                <th scope="row"> <?= $i ?> </th>
                                <td><?= $user->username; ?></td>
                                <td>
                                    <input type="date"
                                           class="form-control"
                                           value="<?= $user->start_vacation; ?>"
                                           min="2021-01-01"
                                           max="2021-12-31"
                                           readonly
                                    >
                                </td>
                                <td>
                                    <div class="form-group">
                                    <input type="date"
                                           class="form-control"
                                           value="<?= $user->end_vacation; ?>"
                                           min="2021-01-01"
                                           max="2021-12-31"
                                           readonly
                                    >
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static"
                                               type="checkbox"
                                               id="blankCheckbox"
                                               <?= $user->approved == 1 ? "checked" : "" ?>
                                               disabled
                                        >
                                    </div>
                                </td>

                                <?php if( !Yii::$app->user->isGuest ): ?>
                                <td>
                                    <?php if( Yii::$app->user->identity->id == $user->id || 2 == Yii::$app->user->identity->status ): ?>
                                        <a href="<?= \yii\helpers\Url::to(['user/edit', 'id' => $user->id]); ?>"
                                           class="btn btn-success"
                                           role="button"
                                        >Редактировать</a>
                                    <?php endif; ?>

                                    <?php if( 2 == Yii::$app->user->identity->status): ?>
                                        <?php if( 0 == $user->approved ): ?>
                                            <a href="<?= \yii\helpers\Url::to(['user/approved', 'id' => $user->id]); ?>"
                                               class="btn btn-info"
                                               role="button"
                                            >Утвердить</a>
                                        <?php else: ?>
                                            <a href="<?= \yii\helpers\Url::to(['user/approved', 'id' => $user->id]); ?>"
                                               class="btn btn-warning"
                                               role="button"
                                            >Запретить</a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <?php endif; ?>

                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>
