<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FocusSessionsFixture
 */
class FocusSessionsFixture extends TestFixture
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
                'activity_name' => 'Lorem ipsum dolor sit amet',
                'category' => 'Lorem ipsum dolor sit amet',
                'duration_minutes' => 1,
                'session_date' => '2026-05-16',
                'created' => '2026-05-16 02:28:12',
            ],
        ];
        parent::init();
    }
}
