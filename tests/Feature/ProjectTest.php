<?php

declare(strict_types=1);

use Illuminate\Http\Response;
use Tests\Feature\TestCase as BaseTestCase;

/**
 * Class projectTest
 * @package Tests\Feature
 */
class projectTest extends BaseTestCase
{
    /**
     * @test
     */
    public function shouldIndexproject()
    {
        $this->signIn();

        $this
            ->json('get', route('api.projects.index'), [], $this->headers())
            ->assertJson([
                'data' => [
                    ['type' => 'project']
                ]
            ])
            ->assertJsonStructure([
                'data' => [
                    [
                        'type',
                        'id',
                        'attributes' => [
                            'createdAt',
                            'updatedAt',
                        ],
                    ]
                ],
                'meta' => [
                    'totalPages',
                    'totalItems',
                ],
            ])
            ->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function shouldFilterIndexproject()
    {
        $this->signIn();
        $data = ['filter' => ['query' => '']];

        $this
            ->json('get', route('api.projects.index'), $data, $this->headers())
            ->assertJson([
                'data' => [
                ]
            ])
            ->assertJsonMissing([
                'data' => [
                ]
            ])
            ->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function shouldShowproject()
    {
        $this->signIn();
        $show = 1;

        $this
            ->json('get', route('api.projects.show', $show), [], $this->headers())
            ->assertJson([
                'data' => [
                    'type' => 'project',
                    'id' => $show,
                ]
            ])
            ->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function shouldStoreproject()
    {
        $this->signIn();
        $data = [];

        $this
            ->json('post', route('api.projects.store'), $data, $this->headers())
            ->assertJson(['data' => []])
            ->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('projects', [
        ]);
    }

    /**
     * @test
     */
    public function shouldErrorStoreproject()
    {
        $this->signIn();

        $this
            ->json('post', route('api.projects.store'), [], $this->headers())
            ->assertJson([
                'errors' => [
                ]
            ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function shouldUpdateproject()
    {
        $this->signIn();
        $update = 1;
        $data = [
        ];

        $this
            ->json('put', route('api.projects.update', $update), $data, $this->headers())
            ->assertJson(['data' => []])
            ->assertStatus(Response::HTTP_OK);

        $this->assertDatabaseHas('projects', [
            'id' => $update
        ]);
    }

    /**
     * @test
     */
    public function shouldErrorUpdateproject()
    {
        $this->signIn();
        $update = 1;

        $this
            ->json('put', route('api.projects.update', $update), [], $this->headers())
            ->assertJson([
                'errors' => [
                ]
            ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function shouldDeleteproject()
    {
        $this->signIn();
        $delete = 1;

        $this
            ->json('delete', route('api.projects.destroy', $delete), [], $this->headers())
            ->assertStatus(Response::HTTP_NO_CONTENT);

        $this->assertDatabaseMissing('projects', ['id' => $delete]);
    }

    /**
     * @test
     */
    public function shouldErrorsDeleteproject()
    {
        $this->signIn();
        $delete = 999;

        $this
            ->json('delete', route('api.projects.destroy', $delete), [], $this->headers())
            ->assertJson([
                'errors' => [
                    $this->errorPageNotFound()
                ]
            ])
            ->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
