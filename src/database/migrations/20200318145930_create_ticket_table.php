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
