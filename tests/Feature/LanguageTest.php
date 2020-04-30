<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\Feature\TestCase as BaseTestCase;

/**
 * Class LanguageTest
 * @package Tests\Feature
 */
class LanguageTest extends BaseTestCase
{
    /**
     * @test
     */
    public function shouldIndexLanguage()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];

        $this
            ->json('get', route('api.languages.index'), [], $headers)
            ->assertJson([
                'data' => [
                    ['type' => 'language']
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
    public function shouldShowLanguage()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $show = 1;

        $this
            ->json('get', route('api.languages.show', $show), [], $headers)
            ->assertJson([
                'data' => [
                    'type' => 'language',
                    'id' => $show,
                ]
            ])
            ->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function shouldStoreLanguage()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $data = [];

        $this
            ->json('post', route('api.languages.store'), $data, $headers)
            ->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('languages', [
        ]);
    }

    /**
     * @test
     */
    public function shouldErrorStoreLanguage()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];

        $this
            ->json('post', route('api.languages.store'), [], $headers)
            ->assertJson([
                'errors' => [
                ]
            ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function shouldUpdateLanguage()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $update = 1;
        $data = [
        ];

        $this
            ->json('put', route('api.languages.update', $update), $data, $headers)
            ->assertStatus(Response::HTTP_OK);

        $this->assertDatabaseHas('languages', [
        ]);
    }

    /**
     * @test
     */
    public function shouldDeleteLanguage()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $delete = 1;

        $this
            ->json('delete', route('api.languages.destroy', $delete), [], $headers)
            ->assertStatus(Response::HTTP_NO_CONTENT);

        $this->assertDatabaseMissing('languages', ['id' => $delete]);
    }


    /**
     * @test
     */
    public function shouldErrorsDeleteLanguage()
    {
        $token = $this->signIn()['accessToken'];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $delete = 999;

        $this
            ->json('delete', route('api.languages.destroy', $delete), [], $headers)
                ->assertJson([
                    'errors' => [
                        $this->errorPageNotFound()
                    ]
                ])
                ->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
