<?php namespace Tests\Repositories;

use App\Models\comedies;
use App\Repositories\comediesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class comediesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var comediesRepository
     */
    protected $comediesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->comediesRepo = \App::make(comediesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_comedies()
    {
        $comedies = factory(comedies::class)->make()->toArray();

        $createdcomedies = $this->comediesRepo->create($comedies);

        $createdcomedies = $createdcomedies->toArray();
        $this->assertArrayHasKey('id', $createdcomedies);
        $this->assertNotNull($createdcomedies['id'], 'Created comedies must have id specified');
        $this->assertNotNull(comedies::find($createdcomedies['id']), 'comedies with given id must be in DB');
        $this->assertModelData($comedies, $createdcomedies);
    }

    /**
     * @test read
     */
    public function test_read_comedies()
    {
        $comedies = factory(comedies::class)->create();

        $dbcomedies = $this->comediesRepo->find($comedies->id);

        $dbcomedies = $dbcomedies->toArray();
        $this->assertModelData($comedies->toArray(), $dbcomedies);
    }

    /**
     * @test update
     */
    public function test_update_comedies()
    {
        $comedies = factory(comedies::class)->create();
        $fakecomedies = factory(comedies::class)->make()->toArray();

        $updatedcomedies = $this->comediesRepo->update($fakecomedies, $comedies->id);

        $this->assertModelData($fakecomedies, $updatedcomedies->toArray());
        $dbcomedies = $this->comediesRepo->find($comedies->id);
        $this->assertModelData($fakecomedies, $dbcomedies->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_comedies()
    {
        $comedies = factory(comedies::class)->create();

        $resp = $this->comediesRepo->delete($comedies->id);

        $this->assertTrue($resp);
        $this->assertNull(comedies::find($comedies->id), 'comedies should not exist in DB');
    }
}
