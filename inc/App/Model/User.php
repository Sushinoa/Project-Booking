<?php
namespace App\Model;

use App\Components\Db;

class User extends ParentModel
{

    public $id_user;//идентификатор в БД пользователя
    public $name; //имя пользователя
    public $email;//email пользователя
    public $password;//пароль пользователя
    public $is_admin;//пользователь/админ
    public $avatar;//аватар пользователя

    //Методы валидации формы
    /**
     * Проверяет имя: не меньше, чем 2 символа
     */
    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет email
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет пароль: не меньше, чем 6 символов
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }
    /**
     * Проверяет пароль новый: не меньше, чем 6 символов
     */
    public static function checkPasswordNew($passwordNew)
    {
        if (strlen($passwordNew) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет телефон: не меньше, чем 10 символов
     */
    public static function checkPhone($phone)
    {
        if (strlen($phone) >= 10) {
            return true;
        }
        return false;
    }


    public static function checkEmailExists($email)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, \PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()) {

            return true;
        }

        return false;
    }


    public static function checkUser($email)//на пустоту массив
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM users WHERE email = :email ';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, \PDO::PARAM_STR);//убрать парам инт это число

        $result->execute();

        $data = $result->fetch();

        return $data;
    }

    public static function auth($idUser,$nameUser,$avatarUser)
    {
        $_SESSION['user'] = $idUser;
        $_SESSION['name'] = $nameUser;
        $_SESSION['avatar'] = $avatarUser;
    }



    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
           return $_SESSION['user'];

        }

        header("Location: /user/login");
    }

    //Отображаем определенные шаблоны в зависимости гость на сайте или авторизированный пользователь
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    //Получаем данные о пользователе
    public static function getUserById($id)
    {
        if ($id) {
            $db = Db::getConnection();
            $query = 'SET CHARSET utf8';
            $db->query($query);
            $result = $db->prepare('SELECT * FROM users WHERE id_user = :id_user ');
            $result->bindParam(':id_user', $id, \PDO::PARAM_INT);

            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(\PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }


    public function getTableName()
    {
        return 'users';
    }

    public function getIDColumn()
    {
        return 'id_user';
    }


    public function jsonSerialize()
    {
        return get_object_vars($this);

    }

}