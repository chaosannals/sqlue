<?php

namespace sqlue;

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

    public function select($field, $alias = null)
    {
        if (is_null($this->operation)) {
            $this->operation = self::OPERATION_SELECT;
        } else if ($this->operation !== self::OPERATION_SELECT) {
            throw new SQLException();
        }
        $this->fields[$field] = $alias;
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
    }
}
