<?php

namespace App\Controller;

use App\Model\User;
use App\Model\Request;
use App\Model\Appartment;
use App\Components\File;

class CabinetController
{

    public function actionIndex()
    {
        global $twig;
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        if(empty( $userId )){
            header("Location: /"); //если юзера нет то перенаправляем на главную
        }

        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);
        User::isGuest();
        $email = $user['email'];
        $orders = Request::getUserRequest($email);
        $idApart = array();

        foreach ($orders as $arr) {

            foreach ($arr as $key => $value) {
                if ($key == 'id_apartment') {

                    array_push($idApart, $value);

                }
            }
        }
        $rooms = Appartment::getHotel($idApart);


        echo $twig->render('cabinet.twig', array(
            'user'   => $user,
            'orders' => $orders,
            'rooms'  => $rooms

        ));

    }

    public function actionEdit()
    {
        global $twig;
        // Получаем идентификатор пользователя из сессии
        $id = User::checkLogged();
        $user = User::getUserById($id);
        $email = $user['email'];
        $avatarOld = $user['avatar'];

        $errors = [];

        $name = @$_POST['name'];
        $password_inp = @$_POST['passwordold'];
        $passwordNew = @$_POST['passwordnew'];
        $password = @$_POST['password'];
        $nameFile = @$_FILES['avatar']['name'];
        $typeFile = @$_FILES['avatar']['type'];
        $tmp_nameFile = @$_FILES['avatar']['tmp_name'];
        $passwordOld =  password_verify($password_inp, $user['password']);
        $uploaddir = 'upload/';
        $pathFile = $uploaddir . $nameFile;

        if ($typeFile == '') {
            $pathFile = '';
        } elseif (!File::checkTypeFile($typeFile)) {
            $errors[] = 'Фомат файла должен быть .jpeg, .png,.jpg';
        } else {
            $pathFile = File::fileTransformation($nameFile, $typeFile, $tmp_nameFile);
        }

        $avatar = '/' . $pathFile;
        if (empty($nameFile)) {
            $avatar = $avatarOld;
        }

        if ($passwordOld == false) {
            $errors[] = 'Ваш текущий пароль введен не правильно!';
        }

        if ($passwordNew != $password) {
            $errors[] = 'Ваши введеные новые пароли не совпадают';
        }

        if (!User::checkName($name)) {
            $errors[] = 'Имя не должно быть короче 2-х символов';
        }

        if (!User::checkPassword($password)) {
            $errors[] = 'Пароль не должен быть короче 6-ти символов';
        }
        if (!User::checkPassword($passwordNew)) {
            $errors[] = 'Пароль не должен быть короче 6-ти символов';
        }




        if (!count($errors)) {

            $password = password_hash($password, PASSWORD_DEFAULT);
            $model = new User();
            $data = array(
                'name'     => $name,
                'email'    => $email,
                'avatar'   => $avatar,
                'password' => $password
            );

            $model->update($data, $id);
            $idUser = $user['id_user'];
            $nameUser = $name;
            $avatarUser = $avatar;
            User::auth($idUser,$nameUser,$avatarUser);

            header("HTTP/1.0 200 Ok");

                echo "Ваш профиль изменен!";
                return true;

        } elseif ($errors) {

            header("HTTP/1.0 404 Bad Request");
                foreach ($errors as $error) {
                    echo $error;
                    return true;
                }
        }


        echo $twig->render('edit-Userform.twig',array(
            'user' => $user,

            ));


    }


}