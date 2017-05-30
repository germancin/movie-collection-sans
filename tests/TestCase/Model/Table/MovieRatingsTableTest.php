<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MovieRatingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MovieRatingsTable Test Case
 */
class MovieRatingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MovieRatingsTable
     */
    public $MovieRatings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.movie_ratings',
        'app.movies',
        'app.formats',
        'app.formats_movies',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MovieRatings') ? [] : ['className' => 'App\Model\Table\MovieRatingsTable'];
        $this->MovieRatings = TableRegistry::get('MovieRatings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MovieRatings);

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
