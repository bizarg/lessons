<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\Feature\TestCase as BaseTestCase;

/**
 * Class NotificationTest
 * @package Tests\Feature
 */
class NotificationTest extends BaseTestCase
{
    /**
     * @test
     */
    public function shouldIndexNotification()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];

        $this
            ->json('get', route('api.notifications.index'), [], $headers)
            ->assertJson([
                'data' => [
                    ['type' => 'notification']
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
    public function shouldShowNotification()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $show = 1;

        $this
            ->json('get', route('api.notifications.show', $show), [], $headers)
            ->assertJson([
                'data' => [
                    'type' => 'notification',
                    'id' => $show,
                ]
            ])
            ->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function shouldStoreNotification()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $data = [];

        $this
            ->json('post', route('api.notifications.store'), $data, $headers)
            ->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('notifications', [
        ]);
    }

    /**
     * @test
     */
    public function shouldErrorStoreNotification()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];

        $this
            ->json('post', route('api.notifications.store'), [], $headers)
            ->assertJson([
                'errors' => [
                ]
            ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function shouldUpdateNotification()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $update = 1;
        $data = [
        ];

        $this
            ->json('put', route('api.notifications.update', $update), $data, $headers)
            ->assertStatus(Response::HTTP_OK);

        $this->assertDatabaseHas('notifications', [
        ]);
    }

    /**
     * @test
     */
    public function shouldDeleteNotification()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $delete = 1;

        $this
            ->json('delete', route('api.notifications.destroy', $delete), [], $headers)
            ->assertStatus(Response::HTTP_NO_CONTENT);

        $this->assertDatabaseMissing('notifications', ['id' => $delete]);
    }


    /**
     * @test
     */
    public function shouldErrorsDeleteNotification()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $delete = 999;

        $this
            ->json('delete', route('api.notifications.destroy', $delete), [], $headers)
                ->assertJson([
                    'errors' => [
                        $this->errorPageNotFound()
                    ]
                ])
                ->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
