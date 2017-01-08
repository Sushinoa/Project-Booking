<?php

namespace App\Controller;

use App\Model\Request;
use App\Model\User;

class OrderController
{

    public function actionAdd($id)
    {
        global $twig;

        $errors = [];


        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();
        //Если идентификотор есть то получаем все данные о пользователе
        // и подставляем его имейл в переменную $email а иначе берем из массива $_POST
        if ($userId) {
            $user = User::getUserById($userId);
            $email = $user['email'];
            $name = $user['name'];
        } else {
            $email = @$_POST['email'];
            $name = @$_POST['name'];
        }

        $phone = @$_POST['phone'];
        $date_arrival = @$_POST['date_arrival'];
        $date_departure = @$_POST['date_departure'];
        $comment = @$_POST['comment'];
        $date = @$_POST['calend'];

        if (!User::checkName($name)) {
            $errors[] = 'Имя не должно быть короче 2-х символов';
        }


        if (!User::checkEmail($email)) {
            $errors[] = 'Неправильный email';
        }

        if (!User::checkPhone($phone)) {
            $errors[] = 'Неправильно введен номер телефона';
        }


        if (!count($errors)) {
            $model = new Request();
            $model->create([
                'id_apartment'    => $id,
                'name'            => $name,
                'email'           => $email,
                'phone'           => $phone,
                'date_arrival'    => $date_arrival,
                'date_departure'  => $date_departure,
                'comment'         => $comment,
                'date_request'    => $date
            ]);

            header("HTTP/1.0 200 Ok");

                echo "Ваша заявка на бронирование принята!";
                return;

        } elseif ($errors) {
            header("HTTP/1.0 401 Bad Request");
                foreach ($errors as $error) {
                    echo $error;
                    return;
                }
        }

        echo $twig->render('reservation-form.twig');
    }
}