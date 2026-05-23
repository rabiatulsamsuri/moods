<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DistractionsFixture
 */
class DistractionsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'application_name' => 'Lorem ipsum dolor sit amet',
                'count_or_minutes' => 1,
                'log_date' => '2026-05-16',
            ],
        ];
        parent::init();
    }
}
