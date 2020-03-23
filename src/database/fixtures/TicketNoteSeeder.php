<?php

use Phinx\Seed\AbstractSeed;

/**
 * Ticket note seeder
 * 
 * @author artbyrab
 */
class TicketNoteSeeder extends AbstractSeed
{
    /**
     * {@inheritDoc}
     */
    public function getDependencies()
    {
        return [
            'TicketSeeder',
        ];
    }

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = [
            [
                'ticket_id' => 1,
                'note' => 'This ticket is well overdue, can someone pick this up.',
                'created_datetime' => date('Y-m-d H:i:s'),
                'updated_datetime' => date('Y-m-d H:i:s'),
            ],
            [
                'ticket_id' => 2,
                'note' => 'This ticket needs further investigation, please can you ensure support investigate this.',
                'created_datetime' => date('Y-m-d H:i:s'),
                'updated_datetime' => date('Y-m-d H:i:s'),
            ]
        ];

        $posts = $this->table('ticket_note');
        $posts->insert($data)
              ->save();
    }
}
