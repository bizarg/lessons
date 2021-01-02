<?php

declare(strict_types=1);

use Illuminate\Http\Response;
use Tests\Feature\TestCase as BaseTestCase;

/**
 * Class CategoryTest
 * @package Tests\Feature
 */
class CategoryTest extends BaseTestCase
{
    /**
     * @test
     */
    public function shouldIndexCategory()
    {
        $this->signIn();

        $this
            ->json('get', route('api.categories.index'), [], $this->headers())
            ->assertJson([
                'data' => [
                    ['type' => 'category']
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
    public function shouldFilterIndexCategory()
    {
        $this->signIn();
        $data = ['filter' => ['query' => '']];

        $this
            ->json('get', route('api.categories.index'), $data, $this->headers())
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
    public function shouldShowCategory()
    {
        $this->signIn();
        $show = 1;

        $this
            ->json('get', route('api.categories.show', $show), [], $this->headers())
            ->assertJson([
                'data' => [
                    'type' => 'category',
                    'id' => $show,
                ]
            ])
            ->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function shouldStoreCategory()
    {
        $this->signIn();
        $data = [];

        $this
            ->json('post', route('api.categories.store'), $data, $this->headers())
            ->assertJson(['data' => []])
            ->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('categories', [
        ]);
    }

    /**
     * @test
     */
    public function shouldErrorStoreCategory()
    {
        $this->signIn();

        $this
            ->json('post', route('api.categories.store'), [], $this->headers())
            ->assertJson([
                'errors' => [
                ]
            ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function shouldUpdateCategory()
    {
        $this->signIn();
        $update = 1;
        $data = [
        ];

        $this
            ->json('put', route('api.categories.update', $update), $data, $this->headers())
            ->assertJson(['data' => []])
            ->assertStatus(Response::HTTP_OK);

        $this->assertDatabaseHas('categories', [
            'id' => $update
        ]);
    }

    /**
     * @test
     */
    public function shouldErrorUpdateCategory()
    {
        $this->signIn();
        $update = 1;

        $this
            ->json('put', route('api.categories.update', $update), [], $this->headers())
            ->assertJson([
                'errors' => [
                ]
            ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function shouldDeleteCategory()
    {
        $this->signIn();
        $delete = 1;

        $this
            ->json('delete', route('api.categories.destroy', $delete), [], $this->headers())
            ->assertStatus(Response::HTTP_NO_CONTENT);

        $this->assertDatabaseMissing('categories', ['id' => $delete]);
    }

    /**
     * @test
     */
    public function shouldErrorsDeleteCategory()
    {
        $this->signIn();
        $delete = 999;

        $this
            ->json('delete', route('api.categories.destroy', $delete), [], $this->headers())
            ->assertJson([
                'errors' => [
                    $this->errorPageNotFound()
                ]
            ])
            ->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
