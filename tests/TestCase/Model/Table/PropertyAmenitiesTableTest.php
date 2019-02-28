<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PropertyAmenitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PropertyAmenitiesTable Test Case
 */
class PropertyAmenitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PropertyAmenitiesTable
     */
    public $PropertyAmenities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PropertyAmenities',
        'app.Properties',
        'app.Amenities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PropertyAmenities') ? [] : ['className' => PropertyAmenitiesTable::class];
        $this->PropertyAmenities = TableRegistry::getTableLocator()->get('PropertyAmenities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PropertyAmenities);

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
