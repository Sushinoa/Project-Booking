<?php

namespace App\Model;

class AppartmentAttachment extends ParentModel
{

    public $id_apartment_attachment;//идентификатор в БД фото для номера
    public $id_apartment;//идентификатор номера в БД
    public $src; //ссылка на фото


    public function getTableName()
    {
        return 'appartments_attachments';
    }

    public function getIDColumn()
    {
        return 'id_apartment_attachment';
    }


    public function jsonSerialize()
    {
        return get_object_vars($this);

    }

}


