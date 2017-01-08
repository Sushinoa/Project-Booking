<?php

namespace App\Model;

use App\Components\Db;

abstract class ParentModel implements \JsonSerializable
{


    /**
     * Возвращает название таблицы для модели
     *
     * @return string
     */
    abstract public function getTableName();

    /**
     * Возвращает название поля которое используется как ID
     *
     * @return string
     */
    abstract public function getIDColumn();

    public function __construct(array $data = [])
    {

        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    /*
     *Вывод записи по id
     */
    public function find($id)
    {

        if ($id) {

            $db = Db::getConnection();
            $sql = 'SELECT * FROM `' . $this->getTableName()
                . '` WHERE `' . $this->getIDColumn() . '` = ' . $id;
            $stmt = $db->query($sql);
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);

            $Item = $stmt->fetch();

            return $Item;
        }
        return [];

    }

    /*
     * Запрос на вывод данных из таблицы в БД по условию
     */
    public function findBy(array $where = [], array $orderBy = [], $limit = null, $offset = null)
    {
        $sql = 'SELECT * FROM `' . $this->getTableName() . '`';

        if (count($where)) {
            $sql .= ' WHERE ' . implode(' AND ', $where);
        }

        if (count($orderBy)) {
            $sql .= ' ORDER BY ' . implode(',', $orderBy);
        }

        if ($limit !== null) {
            $sql .= ' LIMIT ' . $limit;
        }

        if ($offset !== null) {
            $sql .= ' OFFSET ' . $offset;
        }


        $db = Db::getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute();

        return array_map(function($row){
            return new static($row);
        }, $stmt->fetchAll());


    }

    /*
     *  Запрос на вывод общего количества записей из таблицы в БД
     */
    public function countBy(array $where = [])
    {
        $db = Db::getConnection();
        $sql = 'SELECT count(`' . $this->getIDColumn() . '`) AS count FROM `' . $this->getTableName() . '` ';

        if (count($where)) {
            $sql .= ' WHERE ' . implode(' AND ', $where);
        }
        $result = $db->query($sql);
        $result->setFetchMode(\PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];

    }

    /*
     * Создание новой записи в БД
     */
    public function create(array $data)
    {
        $db = Db::getConnection();

        if (!count($data)) {
            throw new \InvalidArgumentException('Data is empty');
        }

        $keys = array_keys($data);

        $fields = array_map(function ($key) {
            return "`{$key}`";
        }, $keys);
        $placeholders = array_map(function ($key) {
            return ":{$key}";
        }, $keys);

        $sql = 'INSERT INTO `' . $this->getTableName() . '` ('
            . implode(',', $fields)
            . ') VALUES ('
            . implode(',', $placeholders)
            . ')';

        $stmt = $db->prepare($sql);

        foreach ($data as $field => $value) {
            $stmt->bindValue(":{$field}", $value);
        }

        $stmt->execute();

        return $db->lastInsertId();
    }

    /*
     * Обновление записи в БД по id
     */
    public function update(array $data, $id)
    {
        $db = Db::getConnection();

        if (!count($data)) {
            throw new \RuntimeException('Data is empty');
        }

        $keys = array_keys($data);

        $fields = array_map(function ($key) {
            return "`{$key}` = :{$key}";
        }, $keys);


        $sql = 'UPDATE `' . $this->getTableName() . '`  SET  '
            . implode(', ', $fields) . ' WHERE `'
            . $this->getIDColumn() . '` = '
            . $id;
        $stmt = $db->prepare($sql);

        foreach ($data as $field => $value) {
            $stmt->bindValue(":{$field}", $value);

        }
        $stmt->execute();

    }

    /*
     * Удаление записи из таблицы в БД по id
     */

    public function remove($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE  FROM `' . $this->getTableName()
            . '` WHERE `' . $this->getIDColumn() . '` = ' . $id;
        $stmt = $db->prepare($sql);
        $stmt->execute();


    }
}