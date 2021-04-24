<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\comedies;

class comediesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_comedies()
    {
        $comedies = factory(comedies::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/comedies', $comedies
        );

        $this->assertApiResponse($comedies);
    }

    /**
     * @test
     */
    public function test_read_comedies()
    {
        $comedies = factory(comedies::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/comedies/'.$comedies->id
        );

        $this->assertApiResponse($comedies->toArray());
    }

    /**
     * @test
     */
    public function test_update_comedies()
    {
        $comedies = factory(comedies::class)->create();
        $editedcomedies = factory(comedies::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/comedies/'.$comedies->id,
            $editedcomedies
        );

        $this->assertApiResponse($editedcomedies);
    }

    /**
     * @test
     */
    public function test_delete_comedies()
    {
        $comedies = factory(comedies::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/comedies/'.$comedies->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/comedies/'.$comedies->id
        );

        $this->response->assertStatus(404);
    }
}
