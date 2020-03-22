<?php

use Phinx\Migration\AbstractMigration;

/**
 * Create ticket note table
 * 
 * @author artbyrab
 */
class CreateTicketNoteTable extends AbstractMigration
{
    /**
     * @inheritDoc
     */
    public function up()
    {
        $table = $this->table('ticket_note');
        $table->addColumn('ticket_id', 'integer')
            ->addIndex(['ticket_id'])
            ->addForeignKey('ticket_id', 'ticket', 'id', ['delete'=> 'CASCADE', 'update'=> 'CASCADE'])
            ->addColumn('note', 'text')
            ->addColumn('created_datetime', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_datetime', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }

    /**
     * @inheritDoc
     */
    public function down()
    {
        $this->table('ticket_note')->drop()->save();
    }
}
