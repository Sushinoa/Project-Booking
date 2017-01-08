<?php

namespace App\Model;

use App\Components\Db;

class Request extends ParentModel
{
    public $id_request;//идентификатор в БД заявка на бронирование
    public $id_apartment;//идентификатор в БД номера
    public $name; //имя заказчика
    public $email;//email заказчика
    public $phone;//телефон заказчика
    public $date_arrival; //дата заезда
    public $date_departure; //дата выезда
    public $comment; //комментрай
    public $date_request;//дата подачи заявки
    public $is_approved; //заявка принята/не принята
    /**
     * @inheritdoc
     */

    public static function getUserRequest($email)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM requests WHERE email=:email ';
        $result = $db->prepare($sql);
        $result->bindParam('email', $email);
        $result->execute();
        return $result->fetchAll();

    }
    public function getTableName()
    {
        return 'requests';
    }

    /**
     * @inheritdoc
     */
    public function getIDColumn()
    {
        return 'id_request';
    }


    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}