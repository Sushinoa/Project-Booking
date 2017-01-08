<?php

namespace App\Controller;

use App\Model\User;

class AdminController
{

    public function actionIndex()
    {
        global $twig;
        //Проверяем авторизирован ли пользователь если нет то просим авторизироваться
        $userId = User::checkLogged();
        $user = User::getUserById($userId);

        if ($user['is_admin'] == '1') {
            echo $twig->render('admin.twig',array('user'=>$user));
        } else {
            echo $twig->render('stop.twig');
        }


    }

}