<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MoodEntriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MoodEntriesTable Test Case
 */
class MoodEntriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MoodEntriesTable
     */
    protected $MoodEntries;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.MoodEntries',
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
        $config = $this->getTableLocator()->exists('MoodEntries') ? [] : ['className' => MoodEntriesTable::class];
        $this->MoodEntries = $this->getTableLocator()->get('MoodEntries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MoodEntries);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\MoodEntriesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\MoodEntriesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
