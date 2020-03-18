<?php


use Phinx\Seed\AbstractSeed;

class TicketSeeder extends AbstractSeed
{
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
                'title' => 'Help desk request',
                'description' => 'I need some assistance with the ticketing system can someone from the help desk please contact me.',
                'created_datetime' => date('Y-m-d H:i:s'),
                'updated_datetime' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'New customer added',
                'description' => 'A new customer has been added to the system but there is an issue with their email.',
                'created_datetime' => date('Y-m-d H:i:s'),
                'updated_datetime' => date('Y-m-d H:i:s'),
            ]
        ];

        $posts = $this->table('ticket');
        $posts->insert($data)
              ->save();
    }
}
