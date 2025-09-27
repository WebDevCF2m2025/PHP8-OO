<?php

class ArticleManager implements ManagerInterface, CrudInterface
{
    private $db;

    public function __construct(PDO $connect)
    {
        $this->db = $connect;
    }

    public function create()
    {

    }

    public function read()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}

