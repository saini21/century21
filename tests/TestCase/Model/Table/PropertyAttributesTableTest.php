<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PropertyAttributesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PropertyAttributesTable Test Case
 */
class PropertyAttributesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PropertyAttributesTable
     */
    public $PropertyAttributes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PropertyAttributes',
        'app.Properties'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PropertyAttributes') ? [] : ['className' => PropertyAttributesTable::class];
        $this->PropertyAttributes = TableRegistry::getTableLocator()->get('PropertyAttributes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PropertyAttributes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
