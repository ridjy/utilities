<?php

interface DatabaseInterface
{
    public function execute($query) : self;
    
    public function fetchAll() : array;
}

class MySQL implements DatabaseInterface
{
    public function execute($query)
    {
        /*...*/
    }

    public function fetchAll()
    {
         /*...*/       
    }
}

class UserRepository
{
    private $database;

    public function __contruct(DatabaseInterface $database)
    {
        $this->database = $database;
    }

    public function getAll()
    {
        $users = [];
        $results = $this->database
            ->execute('SELECT * FROM users')
            ->fetchAll()
        ;
        
        foreach($results as $result) {
            $users[] = new User($result);
        }
        
        return $users;
    }
}

$userMySQLRepository = new UserRepository(new MySQL());
$userRestApiRepository = new UserRepository(new RestApiClient());