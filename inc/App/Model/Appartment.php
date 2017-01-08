<?php

namespace App\Model;

use App\Components\Db;

class Appartment extends ParentModel
{
    public $id_apartment;//идентификатор в БД номера
    public $id_hotel;//идентификатор в БД отеля
    public $title; //название номера
    public $description;//описание номера
    public $price;//цена номера за сутки
    public $is_top;//если 1 то номер находится в топ8 на главной
    public $size;//количество мест
    public $type;//тип номера
    public $foto;

    public static function getTop()
    {

        $db = Db::getConnection();
        $sql = 'SELECT * FROM apartments WHERE is_top = 1 ';
        $result = $db->prepare($sql);
        $result->execute();

        return $result->fetchAll();

    }


    public static function getMinPrice($id)
    {

        $db = Db::getConnection();
        $sql = 'SELECT MIN(price) FROM apartments WHERE id_hotel=:id_hotel';
        $result = $db->prepare($sql);
        $result->bindParam('id_hotel', $id);
        $result->execute();

        $row = $result->fetch();

        return $row['MIN(price)'];

    }
    public static function getMaxPrice($id)
    {

        $db = Db::getConnection();
        $sql = 'SELECT MAX(price) FROM apartments WHERE id_hotel=:id_hotel';
        $result = $db->prepare($sql);
        $result->bindParam('id_hotel', $id);
        $result->execute();

        $row = $result->fetch();

        return $row['MAX(price)'];

    }

    public static function getHotel(array $idApart)
    {
        $idApart = array_filter($idApart, function ($id) {
            return is_numeric($id);
        });

        if (!count($idApart)) {
            return [];
        }

        $db = Db::getConnection();
        $sql = 'SELECT * FROM apartments WHERE id_apartment in (' . implode(', ', $idApart) . ') ';
        $result = $db->prepare($sql);

        $result->execute();

        return $result->fetchAll();

    }


    public function getTableName()
    {
        return 'apartments';

    }

    public function getIDColumn()
    {
        return 'id_apartment';

    }


    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}