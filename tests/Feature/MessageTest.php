<?php

declare(strict_types=1);

use Illuminate\Http\Response;
use Tests\Feature\TestCase as BaseTestCase;

/**
 * Class MessageTest
 * @package Tests\Feature
 */
class MessageTest extends BaseTestCase
{
    /**
     * @test
     */
    public function shouldIndexMessage()
    {
        $this->signIn();

        $this
            ->json('get', route('api.messages.index'), [], $this->headers())
            ->assertJson([
                'data' => [
                    ['type' => 'message']
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
    public function shouldFilterIndexMessage()
    {
        $this->signIn();
        $data = ['filter' => ['query' => '']];

        $this
            ->json('get', route('api.messages.index'), $data, $this->headers())
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
    public function shouldShowMessage()
    {
        $this->signIn();
        $show = 1;

        $this
            ->json('get', route('api.messages.show', $show), [], $this->headers())
            ->assertJson([
                'data' => [
                    'type' => 'message',
                    'id' => $show,
                ]
            ])
            ->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function shouldStoreMessage()
    {
        $this->signIn();
        $data = [];

        $this
            ->json('post', route('api.messages.store'), $data, $this->headers())
            ->assertJson(['data' => []])
            ->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('messages', [
        ]);
    }

    /**
     * @test
     */
    public function shouldErrorStoreMessage()
    {
        $this->signIn();

        $this
            ->json('post', route('api.messages.store'), [], $this->headers())
            ->assertJson([
                'errors' => [
                ]
            ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function shouldUpdateMessage()
    {
        $this->signIn();
        $update = 1;
        $data = [
        ];

        $this
            ->json('put', route('api.messages.update', $update), $data, $this->headers())
            ->assertJson(['data' => []])
            ->assertStatus(Response::HTTP_OK);

        $this->assertDatabaseHas('messages', [
            'id' => $update
        ]);
    }

    /**
     * @test
     */
    public function shouldErrorUpdateMessage()
    {
        $this->signIn();
        $update = 1;

        $this
            ->json('put', route('api.messages.update', $update), [], $this->headers())
            ->assertJson([
                'errors' => [
                ]
            ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function shouldDeleteMessage()
    {
        $this->signIn();
        $delete = 1;

        $this
            ->json('delete', route('api.messages.destroy', $delete), [], $this->headers())
            ->assertStatus(Response::HTTP_NO_CONTENT);

        $this->assertDatabaseMissing('messages', ['id' => $delete]);
    }

    /**
     * @test
     */
    public function shouldErrorsDeleteMessage()
    {
        $this->signIn();
        $delete = 999;

        $this
            ->json('delete', route('api.messages.destroy', $delete), [], $this->headers())
            ->assertJson([
                'errors' => [
                    $this->errorPageNotFound()
                ]
            ])
            ->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
