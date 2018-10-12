<?php

class DataBase
{
    /**
     * private members
     */
    private static $instance = null;
    private $conn;
    private $host = '127.0.0.1';
    private $dbname = 'theschool';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8';

    /**
     * DataBaseConnection private constructor.
     */
    private function __construct()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}";
        $this->conn = new PDO($dsn, $this->user, $this->pass);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    /**
     * function return static instance.
     * @return DataBase|null
     */
    public static function getInstance()
    {
        if(!self::$instance){
            self::$instance = new DataBase();
        }
        return self::$instance;
    }

    /**
     * function get connection to DataBase and return connection.
     * @return PDO
     */
    public function getConnection()
    {
        return $this->conn;
    }

    // disconnect from db

    /**
     * function do disconnect from db
     */
    public function Disconnect()
    {
        $this->conn = null;
    }

    // get row

    /**
     * function return one row of associated array.
     * @param       $query
     * @param array $params
     * @return mixed
     */
    public function getOneRow($query, $params = [])
    {
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch();
        }catch(PDOException $e){
            throw new PDOException($e->getMessage());
        }
    }

    // get rows

    /**
     * function return few rows of associated array.
     * @param       $query
     * @param array $params
     * @return array
     */
    public function getRows($query, $params = [])
    {
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll();
        }catch(PDOException $e){
            throw new PDOException($e->getMessage());
        }
    }

    // insert row

    /**
     * function insert into DataBase one row if succeeded return last insert id else null.
     * @param       $query
     * @param array $params
     * @return bool
     */
    public function insertRow($query, $params = [])
    {
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            return $this->conn->lastInsertId();
        }catch(PDOException $e){
            throw new PDOException($e->getMessage());
            //throw new PDOException($e->getTraceAsString());
        }
    }

    // update row

    /**
     * function update row of  DataBase if succeeded return last ID else null.
     * @param       $query
     * @param array $params
     * @return bool
     */
    public function updateRow($query, $params = [])
    {
        try{
            return $this->insertRow($query, $params);
        }catch(PDOException $e){
            throw new PDOException($e->getMessage());
        }
    }

    // delete row

    /**
     * function delete row of DataBase one row if succeeded return true else false.
     * @param       $query
     * @param array $params
     */
    public function deleteRow($query, $params = [])
    {
        try{
            $this->insertRow($query, $params);
        }catch(PDOException $e){
            throw new PDOException($e->getMessage());
        }
    }

}