<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\peoples;

class peoplesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_peoples()
    {
        $peoples = factory(peoples::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/peoples', $peoples
        );

        $this->assertApiResponse($peoples);
    }

    /**
     * @test
     */
    public function test_read_peoples()
    {
        $peoples = factory(peoples::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/peoples/'.$peoples->id
        );

        $this->assertApiResponse($peoples->toArray());
    }

    /**
     * @test
     */
    public function test_update_peoples()
    {
        $peoples = factory(peoples::class)->create();
        $editedpeoples = factory(peoples::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/peoples/'.$peoples->id,
            $editedpeoples
        );

        $this->assertApiResponse($editedpeoples);
    }

    /**
     * @test
     */
    public function test_delete_peoples()
    {
        $peoples = factory(peoples::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/peoples/'.$peoples->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/peoples/'.$peoples->id
        );

        $this->response->assertStatus(404);
    }
}
