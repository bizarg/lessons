<?php

declare(strict_types=1);

use Illuminate\Http\Response;
use Tests\Feature\TestCase as BaseTestCase;

/**
 * Class RoleTest
 * @package Tests\Feature
 */
class RoleTest extends BaseTestCase
{
    /**
     * @test
     */
    public function shouldIndexRole()
    {
        $this->signIn();

        $this
            ->json('get', route('api.roles.index'), [], $this->headers())
            ->assertJson([
                'data' => [
                    ['type' => 'role']
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
    public function shouldFilterIndexRole()
    {
        $this->signIn();
        $data = ['filter' => ['query' => '']];

        $this
            ->json('get', route('api.roles.index'), $data, $this->headers())
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
    public function shouldShowRole()
    {
        $this->signIn();
        $show = 1;

        $this
            ->json('get', route('api.roles.show', $show), [], $this->headers())
            ->assertJson([
                'data' => [
                    'type' => 'role',
                    'id' => $show,
                ]
            ])
            ->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function shouldStoreRole()
    {
        $this->signIn();
        $data = [];

        $this
            ->json('post', route('api.roles.store'), $data, $this->headers())
            ->assertJson(['data' => []])
            ->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('roles', [
        ]);
    }

    /**
     * @test
     */
    public function shouldErrorStoreRole()
    {
        $this->signIn();

        $this
            ->json('post', route('api.roles.store'), [], $this->headers())
            ->assertJson([
                'errors' => [
                ]
            ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function shouldUpdateRole()
    {
        $this->signIn();
        $update = 1;
        $data = [
        ];

        $this
            ->json('put', route('api.roles.update', $update), $data, $this->headers())
            ->assertJson(['data' => []])
            ->assertStatus(Response::HTTP_OK);

        $this->assertDatabaseHas('roles', [
            'id' => $update
        ]);
    }

    /**
     * @test
     */
    public function shouldErrorUpdateRole()
    {
        $this->signIn();
        $update = 1;

        $this
            ->json('put', route('api.roles.update', $update), [], $this->headers())
            ->assertJson([
                'errors' => [
                ]
            ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function shouldDeleteRole()
    {
        $this->signIn();
        $delete = 1;

        $this
            ->json('delete', route('api.roles.destroy', $delete), [], $this->headers())
            ->assertStatus(Response::HTTP_NO_CONTENT);

        $this->assertDatabaseMissing('roles', ['id' => $delete]);
    }

    /**
     * @test
     */
    public function shouldErrorsDeleteRole()
    {
        $this->signIn();
        $delete = 999;

        $this
            ->json('delete', route('api.roles.destroy', $delete), [], $this->headers())
            ->assertJson([
                'errors' => [
                    $this->errorPageNotFound()
                ]
            ])
            ->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
