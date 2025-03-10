<?php

use think\migration\db\Column;
use think\migration\Migrator;

class Version extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {
        $rows = [
            [
                'id' => null,
                'item' => 'version',
                'value' => '1.0.0',
                'class' => 'system',
                'default_value' => '1.0.0',
                'type' => 'string',
            ],
        ];

        $this->insert('config', $rows);
    }

    public function down()
    {
        $this->execute("DELETE FROM config WHERE config.item = 'version'");
    }
}
