<?php

namespace test;

use PHPUnit\Framework\TestCase;
use sqlue\SQLStatement;

class SQLStatementTest extends TestCase
{
    public function testSelect()
    {
        $sql = new SQLStatement();
        $sql->select([
            'T.name' => 'name'
        ])->from("t_test", 'T');
        echo $sql;
    }
}
