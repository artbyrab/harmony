<?php

use Phinx\Migration\AbstractMigration;

class CreateTicketTable extends AbstractMigration
{
    /**
     * @inheritDoc
     */
    public function up()
    {
        $table = $this->table('ticket');
        // the id column is added by default and is auto increment primary key
        // it can be changed however
        $table->addColumn('title', 'string')
              ->addColumn('description', 'text')
              ->addColumn('created_datetime', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
              ->addColumn('updated_datetime', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
              ->create();
    }

    /**
     * @inheritDoc
     */
    public function down()
    {
        $this->table('ticket')->drop()->save();
    }
}
