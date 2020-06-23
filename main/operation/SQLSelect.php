<?php

namespace sqlue\operation;

class SQLSelect
{
    public $table;
    public $fields;

    public function __toString()
    {
        $item = [];
        foreach ($this->fields as $k => $v) {
            $item[] = "$k AS $v";
        }
        $fields = join(',', $item);
        return "SELECT $fields FROM `{$this->table}` ";
    }
}
