<?php


namespace app\controllers;

use app\models\User;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;

class UserController extends Controller
{
    /**
     * Edit action
     *
     * @return string
     */
    public function actionEdit($id)
    {

        $user = User::findOne($id);

        if($user->load(\Yii::$app->request->post())){
            //$test = \Yii::$app->request->post();
            if ($user->save()) {
                \Yii::$app->session->setFlash('success', 'Успешно сохранено');
                $this->redirect(Url::toRoute(['site/index']));
            } else {
                \Yii::$app->session->setFlash('error', 'Ошибка');
            }
        }

        return $this->render('edit', ['user'=> $user]);
    }

    /**
     * Approved action
     *
     * @return string
     */
    public function actionApproved($id)
    {
        $user = User::findOne($id);

        $user->approved = !$user->approved;
        $user->save();
        $this->redirect(Url::toRoute(['site/index']));
    }

}