<?php
namespace App\Model;

class HotelAttachment extends ParentModel
{

    public $id_fotohotel;//идентификатор в БД отеля
    public $id_hotel; //название отеля
    public $src; //фото отеля


    public function getTableName()
    {
        return 'foto_hotel';
    }

    public function getIDColumn()
    {
        return 'id_fotohotel';
    }


    public function jsonSerialize()
    {
        return get_object_vars($this);

    }

}