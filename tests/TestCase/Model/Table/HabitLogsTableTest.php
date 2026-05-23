<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HabitLogsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HabitLogsTable Test Case
 */
class HabitLogsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HabitLogsTable
     */
    protected $HabitLogs;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.HabitLogs',
        'app.Habits',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('HabitLogs') ? [] : ['className' => HabitLogsTable::class];
        $this->HabitLogs = $this->getTableLocator()->get('HabitLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->HabitLogs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\HabitLogsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\HabitLogsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
