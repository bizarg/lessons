<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\Feature\TestCase as BaseTestCase;

/**
 * Class TagTest
 * @package Tests\Feature
 */
class TagTest extends BaseTestCase
{
    /**
     * @test
     */
    public function shouldIndexTag()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];

        $this
            ->json('get', route('api.tags.index'), [], $headers)
            ->assertJson([
                'data' => [
                    ['type' => 'tag']
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
    public function shouldShowTag()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $show = 1;

        $this
            ->json('get', route('api.tags.show', $show), [], $headers)
            ->assertJson([
                'data' => [
                    'type' => 'tag',
                    'id' => $show,
                ]
            ])
            ->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function shouldStoreTag()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $data = [];

        $this
            ->json('post', route('api.tags.store'), $data, $headers)
            ->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('tags', [
        ]);
    }

    /**
     * @test
     */
    public function shouldErrorStoreTag()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];

        $this
            ->json('post', route('api.tags.store'), [], $headers)
            ->assertJson([
                'errors' => [
                ]
            ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function shouldUpdateTag()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $update = 1;
        $data = [
        ];

        $this
            ->json('put', route('api.tags.update', $update), $data, $headers)
            ->assertStatus(Response::HTTP_OK);

        $this->assertDatabaseHas('tags', [
        ]);
    }

    /**
     * @test
     */
    public function shouldDeleteTag()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $delete = 1;

        $this
            ->json('delete', route('api.tags.destroy', $delete), [], $headers)
            ->assertStatus(Response::HTTP_NO_CONTENT);

        $this->assertDatabaseMissing('tags', ['id' => $delete]);
    }


    /**
     * @test
     */
    public function shouldErrorsDeleteTag()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $delete = 999;

        $this
            ->json('delete', route('api.tags.destroy', $delete), [], $headers)
                ->assertJson([
                    'errors' => [
                        $this->errorPageNotFound()
                    ]
                ])
                ->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
