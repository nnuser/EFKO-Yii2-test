<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<h2>Редактироваие отпуска: <?= $user->username ?></h2>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($user, 'start_vacation')->label('Начало отпуска')->input('date',
    ['options' => ['class' => 'form-control', 'min' => '2021-01-01', 'max' => '2021-12-31']])
?>

<?= $form->field($user, 'end_vacation')->label('Конец отпуска')->input('date',
    ['options' => ['class' => 'form-control', 'min' => '2021-01-01', 'max' => '2021-12-31']]) ?>
<?//= $form->field($user, 'approved')->label('Утвердить')->checkbox()  ?>

<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>

<a href="<?= \yii\helpers\Url::to(['site/index', 'id' => $user->id]); ?>"
   class="btn btn-info"
   role="button"
>Отмена</a>

<?php $form = ActiveForm::end() ?>


