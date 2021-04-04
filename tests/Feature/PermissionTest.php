<?php

declare(strict_types=1);

use Illuminate\Http\Response;
use Tests\Feature\TestCase as BaseTestCase;

/**
 * Class PermissionTest
 * @package Tests\Feature
 */
class PermissionTest extends BaseTestCase
{
    /**
     * @test
     */
    public function shouldIndexPermission()
    {
        $this->signIn();

        $this
            ->json('get', route('api.permissions.index'), [], $this->headers())
            ->assertJson([
                'data' => [
                    ['type' => 'permission']
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
    public function shouldFilterIndexPermission()
    {
        $this->signIn();
        $data = ['filter' => ['query' => '']];

        $this
            ->json('get', route('api.permissions.index'), $data, $this->headers())
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
    public function shouldShowPermission()
    {
        $this->signIn();
        $show = 1;

        $this
            ->json('get', route('api.permissions.show', $show), [], $this->headers())
            ->assertJson([
                'data' => [
                    'type' => 'permission',
                    'id' => $show,
                ]
            ])
            ->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function shouldStorePermission()
    {
        $this->signIn();
        $data = [];

        $this
            ->json('post', route('api.permissions.store'), $data, $this->headers())
            ->assertJson(['data' => []])
            ->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('permissions', [
        ]);
    }

    /**
     * @test
     */
    public function shouldErrorStorePermission()
    {
        $this->signIn();

        $this
            ->json('post', route('api.permissions.store'), [], $this->headers())
            ->assertJson([
                'errors' => [
                ]
            ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function shouldUpdatePermission()
    {
        $this->signIn();
        $update = 1;
        $data = [
        ];

        $this
            ->json('put', route('api.permissions.update', $update), $data, $this->headers())
            ->assertJson(['data' => []])
            ->assertStatus(Response::HTTP_OK);

        $this->assertDatabaseHas('permissions', [
            'id' => $update
        ]);
    }

    /**
     * @test
     */
    public function shouldErrorUpdatePermission()
    {
        $this->signIn();
        $update = 1;

        $this
            ->json('put', route('api.permissions.update', $update), [], $this->headers())
            ->assertJson([
                'errors' => [
                ]
            ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function shouldDeletePermission()
    {
        $this->signIn();
        $delete = 1;

        $this
            ->json('delete', route('api.permissions.destroy', $delete), [], $this->headers())
            ->assertStatus(Response::HTTP_NO_CONTENT);

        $this->assertDatabaseMissing('permissions', ['id' => $delete]);
    }

    /**
     * @test
     */
    public function shouldErrorsDeletePermission()
    {
        $this->signIn();
        $delete = 999;

        $this
            ->json('delete', route('api.permissions.destroy', $delete), [], $this->headers())
            ->assertJson([
                'errors' => [
                    $this->errorPageNotFound()
                ]
            ])
            ->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
