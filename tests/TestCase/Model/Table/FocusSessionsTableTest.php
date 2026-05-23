<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FocusSessionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FocusSessionsTable Test Case
 */
class FocusSessionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FocusSessionsTable
     */
    protected $FocusSessions;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.FocusSessions',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('FocusSessions') ? [] : ['className' => FocusSessionsTable::class];
        $this->FocusSessions = $this->getTableLocator()->get('FocusSessions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->FocusSessions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\FocusSessionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\FocusSessionsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
