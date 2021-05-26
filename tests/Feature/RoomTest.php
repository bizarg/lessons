<?php

declare(strict_types=1);

use Illuminate\Http\Response;
use Tests\Feature\TestCase as BaseTestCase;

/**
 * Class RoomTest
 * @package Tests\Feature
 */
class RoomTest extends BaseTestCase
{
    /**
     * @test
     */
    public function shouldIndexRoom()
    {
        $this->signIn();

        $this
            ->json('get', route('api.rooms.index'), [], $this->headers())
            ->assertJson([
                'data' => [
                    ['type' => 'room']
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
    public function shouldFilterIndexRoom()
    {
        $this->signIn();
        $data = ['filter' => ['query' => '']];

        $this
            ->json('get', route('api.rooms.index'), $data, $this->headers())
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
    public function shouldShowRoom()
    {
        $this->signIn();
        $show = 1;

        $this
            ->json('get', route('api.rooms.show', $show), [], $this->headers())
            ->assertJson([
                'data' => [
                    'type' => 'room',
                    'id' => $show,
                ]
            ])
            ->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function shouldStoreRoom()
    {
        $this->signIn();
        $data = [];

        $this
            ->json('post', route('api.rooms.store'), $data, $this->headers())
            ->assertJson(['data' => []])
            ->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('rooms', [
        ]);
    }

    /**
     * @test
     */
    public function shouldErrorStoreRoom()
    {
        $this->signIn();

        $this
            ->json('post', route('api.rooms.store'), [], $this->headers())
            ->assertJson([
                'errors' => [
                ]
            ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function shouldUpdateRoom()
    {
        $this->signIn();
        $update = 1;
        $data = [
        ];

        $this
            ->json('put', route('api.rooms.update', $update), $data, $this->headers())
            ->assertJson(['data' => []])
            ->assertStatus(Response::HTTP_OK);

        $this->assertDatabaseHas('rooms', [
            'id' => $update
        ]);
    }

    /**
     * @test
     */
    public function shouldErrorUpdateRoom()
    {
        $this->signIn();
        $update = 1;

        $this
            ->json('put', route('api.rooms.update', $update), [], $this->headers())
            ->assertJson([
                'errors' => [
                ]
            ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function shouldDeleteRoom()
    {
        $this->signIn();
        $delete = 1;

        $this
            ->json('delete', route('api.rooms.destroy', $delete), [], $this->headers())
            ->assertStatus(Response::HTTP_NO_CONTENT);

        $this->assertDatabaseMissing('rooms', ['id' => $delete]);
    }

    /**
     * @test
     */
    public function shouldErrorsDeleteRoom()
    {
        $this->signIn();
        $delete = 999;

        $this
            ->json('delete', route('api.rooms.destroy', $delete), [], $this->headers())
            ->assertJson([
                'errors' => [
                    $this->errorPageNotFound()
                ]
            ])
            ->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
