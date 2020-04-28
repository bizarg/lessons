<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\Feature\TestCase as BaseTestCase;

/**
 * Class ProjectTest
 * @package Tests\Feature
 */
class ProjectTest extends BaseTestCase
{
    /**
     * @test
     */
    public function shouldIndexProject()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];

        $this
            ->json('get', route('api.projects.index'), [], $headers)
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
    public function shouldShowProject()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $show = 1;

        $this
            ->json('get', route('api.projects.show', $show), [], $headers)
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
    public function shouldStoreProject()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $data = [];

        $this
            ->json('post', route('api.projects.store'), $data, $headers)
            ->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('projects', [
        ]);
    }

    /**
     * @test
     */
    public function shouldErrorStoreProject()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];

        $this
            ->json('post', route('api.projects.store'), [], $headers)
            ->assertJson([
                'errors' => [
                ]
            ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function shouldUpdateProject()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $update = 1;
        $data = [
        ];

        $this
            ->json('put', route('api.projects.update', $update), $data, $headers)
            ->assertStatus(Response::HTTP_OK);

        $this->assertDatabaseHas('projects', [
        ]);
    }

    /**
     * @test
     */
    public function shouldDeleteProject()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $delete = 1;

        $this
            ->json('delete', route('api.projects.destroy', $delete), [], $headers)
            ->assertStatus(Response::HTTP_NO_CONTENT);

        $this->assertDatabaseMissing('projects', ['id' => $delete]);
    }


    /**
     * @test
     */
    public function shouldErrorsDeleteProject()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $delete = 999;

        $this
            ->json('delete', route('api.projects.destroy', $delete), [], $headers)
                ->assertJson([
                    'errors' => [
                        $this->errorPageNotFound()
                    ]
                ])
                ->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
