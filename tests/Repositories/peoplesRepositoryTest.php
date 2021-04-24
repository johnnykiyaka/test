<?php namespace Tests\Repositories;

use App\Models\peoples;
use App\Repositories\peoplesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class peoplesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var peoplesRepository
     */
    protected $peoplesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->peoplesRepo = \App::make(peoplesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_peoples()
    {
        $peoples = factory(peoples::class)->make()->toArray();

        $createdpeoples = $this->peoplesRepo->create($peoples);

        $createdpeoples = $createdpeoples->toArray();
        $this->assertArrayHasKey('id', $createdpeoples);
        $this->assertNotNull($createdpeoples['id'], 'Created peoples must have id specified');
        $this->assertNotNull(peoples::find($createdpeoples['id']), 'peoples with given id must be in DB');
        $this->assertModelData($peoples, $createdpeoples);
    }

    /**
     * @test read
     */
    public function test_read_peoples()
    {
        $peoples = factory(peoples::class)->create();

        $dbpeoples = $this->peoplesRepo->find($peoples->id);

        $dbpeoples = $dbpeoples->toArray();
        $this->assertModelData($peoples->toArray(), $dbpeoples);
    }

    /**
     * @test update
     */
    public function test_update_peoples()
    {
        $peoples = factory(peoples::class)->create();
        $fakepeoples = factory(peoples::class)->make()->toArray();

        $updatedpeoples = $this->peoplesRepo->update($fakepeoples, $peoples->id);

        $this->assertModelData($fakepeoples, $updatedpeoples->toArray());
        $dbpeoples = $this->peoplesRepo->find($peoples->id);
        $this->assertModelData($fakepeoples, $dbpeoples->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_peoples()
    {
        $peoples = factory(peoples::class)->create();

        $resp = $this->peoplesRepo->delete($peoples->id);

        $this->assertTrue($resp);
        $this->assertNull(peoples::find($peoples->id), 'peoples should not exist in DB');
    }
}
