<?php

use Phinx\Migration\AbstractMigration;

class UpdateTicketTableAddCompleted extends AbstractMigration
{
    /**
     * @inheritDoc
     */
    public function up()
    {
        $table = $this->table('ticket');
        $table->addColumn('completed', 'integer', ['limit' => 1, 'default' => 0])
              ->addColumn('completed_datetime', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
              ->save();
    }

    /**
     * @inheritDoc
     */
    public function down()
    {
        $table = $this->table('ticket');
        $table->removeColumn('completed')
              ->removeColumn('completed_datetime')
              ->save();
    }
}
