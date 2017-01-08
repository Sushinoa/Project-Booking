<?php

namespace App\Controller;

use App\Components\File;
use App\Model\User;

class UserController
{

    public function actionLogin()
    {
        global $twig;

        $errors = [];

        $email = $_POST['email'];
        $password_input = $_POST['password'];

        // Проверяем существуют ли данные о пользователе в БД
        $user = User::checkUser($email);
        $password = password_verify($password_input, $user['password']);

        if ($user == false) {
            $errors[] = 'Неверный логин!';
        } elseif ($password == false) {
            $errors[] = 'Неверный пароль!';
        }

        if (!count($errors)) {
            $idUser = $user['id_user'];
            $nameUser = $user['name'];
            $avatarUser = $user['avatar'];
            User::auth($idUser,$nameUser,$avatarUser);

            header("HTTP/1.0 200 Ok");

            echo "Добро пожаловать на сайт!";
            return;

        } else {

            header("HTTP/1.0 401 Bad Request");
            foreach ($errors as $error) {

                echo $error;
                return;
            }

        }


        echo $twig->render('login-form.twig');
    }

    /* Удаляем данные о пользователе из сессии по нажатию на ссылку выйти  переходим на станицу Главная
    */
    public function actionLogout()
    {
        unset($_SESSION["user"]);
        header("Location: /");
    }

    /*Регистрация нового пользователя на сайте*/
    public function actionJoin()
    {
        global $twig;


        $errors = [];

        $name     = @$_POST['name'];
        $email    = @$_POST['email'];
        $password = @$_POST['password'];

        $nameFile      = @$_FILES['avatar']['name'];
        $typeFile      = @$_FILES['avatar']['type'];
        $tmp_nameFile  = @$_FILES['avatar']['tmp_name'];


        $uploaddir = 'upload/';
        $pathFile = $uploaddir . $nameFile;

        if (!count($_FILES)) {
            $pathFile = '';
        } elseif (!File::checkTypeFile($typeFile)) {
            $errors[] = 'Формат файла должен быть .jpeg, .png,.jpg';
        } else {
            $pathFile = File::fileTransformation($nameFile, $typeFile, $tmp_nameFile);
        }


        if (!User::checkName($name)) {
            $errors[] = 'Имя не должно быть короче 2-х символов';
        }

        if (!User::checkEmail($email)) {
            $errors[] = 'Неправильный email';
        }

        if (!User::checkPassword($password)) {
            $errors[] = 'Пароль не должен быть короче 6-ти символов';
        }
        if (User::checkEmailExists($email)) {
            $errors[] = 'Такой email уже используется';
        }

        $avatar = '/' . $pathFile;

        if (!count($errors)) {

            $password = password_hash($password, PASSWORD_DEFAULT);
            $model = new User();
            $model->create([
                'name'     => $name,
                'email'    => $email,
                'avatar'   => $avatar,
                'password' => $password
            ]);


            header("HTTP/1.0 200 Ok");

            echo "Регистрация прошла успешно!";

            return;

        } elseif ($errors) {

            header("HTTP/1.0 401 Bad Request");

            foreach ($errors as $error) {

                echo $error;

                return;
            }
        }

        echo $twig->render('join-form.twig');
    }
}

