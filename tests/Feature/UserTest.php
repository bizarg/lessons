<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\Feature\TestCase as BaseTestCase;

/**
 * Class UserTest
 * @package Tests\Feature
 */
class UserTest extends BaseTestCase
{
    /**
     * @test
     */
    public function shouldIndexUser()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];

        $this
            ->json('get', route('api.users.index'), [], $headers)
            ->assertJson([
                'data' => [
                    ['type' => 'user']
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
    public function shouldShowUser()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $show = 1;

        $this
            ->json('get', route('api.users.show', $show), [], $headers)
            ->assertJson([
                'data' => [
                    'type' => 'user',
                    'id' => $show,
                ]
            ])
            ->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function shouldStoreUser()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $data = [];

        $this
            ->json('post', route('api.users.store'), $data, $headers)
            ->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('users', [
        ]);
    }

    /**
     * @test
     */
    public function shouldErrorStoreUser()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];

        $this
            ->json('post', route('api.users.store'), [], $headers)
            ->assertJson([
                'errors' => [
                ]
            ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function shouldUpdateUser()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $update = 1;
        $data = [
        ];

        $this
            ->json('put', route('api.users.update', $update), $data, $headers)
            ->assertStatus(Response::HTTP_OK);

        $this->assertDatabaseHas('users', [
        ]);
    }

    /**
     * @test
     */
    public function shouldDeleteUser()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $delete = 1;

        $this
            ->json('delete', route('api.users.destroy', $delete), [], $headers)
            ->assertStatus(Response::HTTP_NO_CONTENT);

        $this->assertDatabaseMissing('users', ['id' => $delete]);
    }


    /**
     * @test
     */
    public function shouldErrorsDeleteUser()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $delete = 999;

        $this
            ->json('delete', route('api.users.destroy', $delete), [], $headers)
                ->assertJson([
                    'errors' => [
                        $this->errorPageNotFound()
                    ]
                ])
                ->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
