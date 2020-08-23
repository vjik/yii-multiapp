<?php

namespace Common\Migration;

use Spiral\Migrations\Migration;

class OrmDefault526d4f904c77b4cb433706241041453d extends Migration
{
    protected const DATABASE = 'default';

    public function up()
    {
        $this->table('employee')
            ->addColumn('id', 'primary', [
                'nullable' => false,
                'default'  => null
            ])
            ->addColumn('login', 'string', [
                'nullable' => false,
                'default'  => null,
                'size'     => 48
            ])
            ->addColumn('password_hash', 'string', [
                'nullable' => false,
                'default'  => null,
                'size'     => 191
            ])
            ->addIndex(["login"], [
                'name'   => 'employee_index_login_5f4279a2d9a07',
                'unique' => true
            ])
            ->setPrimaryKeys(["id"])
            ->create();
    }

    public function down()
    {
        $this->table('employee')->drop();
    }
}
