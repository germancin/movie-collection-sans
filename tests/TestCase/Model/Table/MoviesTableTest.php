<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MoviesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MoviesTable Test Case
 */
class MoviesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MoviesTable
     */
    public $Movies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.movies',
        'app.movie_ratings',
        'app.users',
        'app.formats',
        'app.formats_movies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Movies') ? [] : ['className' => 'App\Model\Table\MoviesTable'];
        $this->Movies = TableRegistry::get('Movies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Movies);

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
