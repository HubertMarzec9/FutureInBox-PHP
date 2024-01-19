<?php

namespace Core;

use PDO;

class Database
{

    private PDO $connection;
    private $statement;

    public function __construct($config, $username = 'php', $password = 'root')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO(
            $dsn,
            $username,
            $password,
            [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }


    public function query($query, $params = []): Database
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function findOrFail() //TODO
    {
        $result = $this->find();

        if(!$result){
            abort(404);
        }

        return $result;
    }

}