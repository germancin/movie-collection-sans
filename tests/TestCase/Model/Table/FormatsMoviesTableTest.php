<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FormatsMoviesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FormatsMoviesTable Test Case
 */
class FormatsMoviesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FormatsMoviesTable
     */
    public $FormatsMovies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.formats_movies',
        'app.movies',
        'app.movie_ratings',
        'app.users',
        'app.user_roles',
        'app.formats'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FormatsMovies') ? [] : ['className' => 'App\Model\Table\FormatsMoviesTable'];
        $this->FormatsMovies = TableRegistry::get('FormatsMovies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FormatsMovies);

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
