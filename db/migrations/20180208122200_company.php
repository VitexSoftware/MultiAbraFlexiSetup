<?php

use Phinx\Migration\AbstractMigration;

class Company extends AbstractMigration
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
    public function change()
    {
        $table = $this->table('company');
        $table
            ->addColumn('enabled', 'boolean', array('default' => false))
            ->addColumn('settings', 'text', ['null' => true])
            ->addColumn('logo', 'text', ['null' => true])
            ->addColumn('flexibee', 'integer', ['limit' => 128])
            ->addColumn('nazev', 'string', ['null' => true, 'limit' => 32])
            ->addColumn('ic', 'string', ['null' => true, 'limit' => 32])
            ->addColumn('company', 'string', ['comment' => 'Company Code'])
            ->addColumn('rw', 'boolean', ['comment' => 'Write permissions'])
            ->addColumn('setup', 'boolean', ['comment' => 'SetUP done'])
            ->addColumn('webhook', 'boolean', ['comment' => 'Webhook ready'])
            ->addColumn('DatCreate', 'datetime', [])
            ->addColumn('DatUpdate', 'datetime', ['null' => true])
            ->addIndex(['flexibee', 'company'], ['unique' => true])
            ->create();
    }
}
