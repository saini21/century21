<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AmenitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AmenitiesTable Test Case
 */
class AmenitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AmenitiesTable
     */
    public $Amenities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Amenities',
        'app.PropertyAmenities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Amenities') ? [] : ['className' => AmenitiesTable::class];
        $this->Amenities = TableRegistry::getTableLocator()->get('Amenities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Amenities);

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
}
