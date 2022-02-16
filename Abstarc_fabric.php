<?php

use JetBrains\PhpStorm\Pure;

abstract class DbFactory
{
    abstract public function createConnection(): Connection;

    abstract public function createRecord(): Record;

    abstract public function createQueryBuilder(): QueryBuilder;

}

interface Connection
{
    public function  getConnect() : string;
}

interface Record
{
    public function execQuery() : string;
}

interface QueryBuilder
{
    public function buildQuery() : string;
}


class MySQLFactory extends DbFactory
{
    #[Pure] public function createConnection(): Connection
    {
        return new MySQLConnection();
    }

    public function createRecord(): Record
    {
        return new MySQLRecord();
    }

    public function createQueryBuilder(): QueryBuilder
    {
        return new MySQLQueryBuilder();
    }
}

class PostgreSQLFactory extends DbFactory
{
    public function createConnection(): Connection
    {
        return new PostgreSQLConnection();
    }

    public function createRecord(): Record
    {
        return new PostgreSQLRecord();
    }

    public function createQueryBuilder(): QueryBuilder
    {
        return new PostgreSQLQueryBuilder();
    }
}

class OracleFactory extends DbFactory
{
    public function createConnection(): Connection
    {
        return new OracleConnection();
    }

    public function createRecord(): Record
    {
        return new OracleRecord();
    }

    public function createQueryBuilder(): QueryBuilder
    {
        return new OracleQueryBuilder();
    }
}


class MySQLConnection implements Connection
{
    public function getConnect() : string
    {
        return "MysqlConnection";
    }
}
class MySQLRecord implements Record
{
    public function execQuery() : string
    {
        return "MysqlRecord";
    }
}
class MySQLQueryBuilder implements QueryBuilder
{
    public function buildQuery() : string
    {
        return "MysqlQueryBuilder";
    }
}

class PostgreSQLConnection implements Connection
{
    public function getConnect() : string
    {
        return "PostgreSQLConnection";
    }
}
class PostgreSQLRecord implements Record
{
    public function execQuery() : string
    {
        return "PostgreSQLRecord";
    }
}
class PostgreSQLQueryBuilder implements QueryBuilder
{
    public function buildQuery() : string
    {
        return "PostgreSQLQueryBuilder";
    }
}

class OracleConnection implements Connection
{
    public function getConnect() : string
    {
        return "OracleConnection";
    }
}
class OracleRecord implements Record
{
    public function execQuery() : string
    {
        return "OracleRecord";
    }
}
class OracleQueryBuilder implements QueryBuilder
{
    public function buildQuery() : string
    {
        return "OracleQueryBuilder";
    }
}

function createDB(DbFactory $factory)
{

    $dbConnection = $factory->createConnection();
    $dbRecord = $factory->createRecord();
    $dbQueryBuilder = $factory->createQueryBuilder();

    echo $dbConnection->getConnect() . "\n" . $dbRecord->execQuery(). "\n" .$dbQueryBuilder->buildQuery()."<br>";

}

createDB(new MySQLFactory());
createDB(new PostgreSQLFactory());
createDB(new OracleFactory());

