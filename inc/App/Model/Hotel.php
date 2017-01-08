<?php
namespace App\Model;

class Hotel extends ParentModel
{

    public $id_hotel;//идентификатор в БД отеля
    public $title; //название отеля
    public $stars;//количество звезд отеля
    public $image;//ссылки на фотографии отеля


    public function getTableName()
    {
        return 'hotels';
    }

    public function getIDColumn()
    {
        return 'id_hotel';
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);

    }

}