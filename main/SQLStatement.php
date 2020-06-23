<?php

namespace sqlue;

use sqlue\operation\SQLSelect;

/**
 * SQL 语句
 * 
 */
class SQLStatement
{
    const OPERATION_SELECT = 1;
    const OPERATION_INSERT = 2;
    const OPERATION_UPDATE = 3;
    const OPERATION_DELETE = 4;

    private $table;
    private $alias;
    private $fields;
    private $operation;

    public function __construct()
    {
        $this->table = null;
        $this->alias = null;
        $this->fields = [];
        $this->operation = null;
    }

    public function from($table, $alias = null)
    {
        $this->table = $table;
        $this->alias = $alias;
        return $this;
    }

    public function select($fields)
    {
        if (is_null($this->operation)) {
            $this->operation = new SQLSelect();
        } else if (!($this->operation instanceof SQLSelect)) {
            throw new SQLException();
        }
        $this->operation->fields = $fields;
        return $this;
    }

    public function delete()
    {
        if (is_null($this->operation)) {
            $this->operation = self::OPERATION_DELETE;
        } else if ($this->operation !== self::OPERATION_DELETE) {
            throw new SQLException();
        }
        return $this;
    }

    public function update()
    {
        if (is_null($this->operation)) {
            $this->operation = self::OPERATION_UPDATE;
        } else if ($this->operation !== self::OPERATION_UPDATE) {
            throw new SQLException();
        }
        return $this;
    }

    public function __toString()
    {
        return (string) $this->operation;
    }
}
