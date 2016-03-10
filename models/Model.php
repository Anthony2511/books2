<?php

/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 10-03-16
 * Time: 15:35
 */
class Model
{
    protected $table = '';
    protected $cn = null;

    public function __construct()
    {
        $dbConfig = parse_ini_file('db.ini');
        $pdoOptions = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $dsn = sprintf('%s:dbname=%s;host=%s', $dbConfig['driver'], $dbConfig['dbname'], $dbConfig['host']);
            $this->cn = new PDO($dsn, $dbConfig['username'], $dbConfig ['password'], $pdoOptions);
            $this->cn->exec('SET CHARACTER SET UTF8'); // a faire a chaque fois
            $this->cn->exec('SET NAMES UTF8');
        } catch (PDOException $exception) {
            // redirection pour afficher une erreur relative à la connexion
            die($exception->getMessage());
        }
    }

    public function all()
    {
        $sql = sprintf('SELECT * FROM %s', $this->table);
        $pdoST = $this->cn->query($sql);
        return $pdoST->fetchAll();
    }

    public function find($id)
    {
        $sql = sprintf('SELECT * FROM %s WHERE id = :id', $this->table);
        $pdoST = $this->cn->prepare($sql);
        $pdoST->execute([':id' => $id]);
        return $pdoST->fetch();
    }
}