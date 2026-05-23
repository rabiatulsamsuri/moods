<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HabitLogsFixture
 */
class HabitLogsFixture extends TestFixture
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
                'habit_id' => 1,
                'date_completed' => '2026-05-16',
            ],
        ];
        parent::init();
    }
}
