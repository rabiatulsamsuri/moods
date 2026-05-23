<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HabitsFixture
 */
class HabitsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'icon' => 'L',
                'target_days_per_week' => 1,
                'created' => '2026-05-16 02:25:49',
            ],
        ];
        parent::init();
    }
}
