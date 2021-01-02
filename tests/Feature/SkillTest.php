<?php

declare(strict_types=1);

use Illuminate\Http\Response;
use Tests\Feature\TestCase as BaseTestCase;

/**
 * Class SkillTest
 * @package Tests\Feature
 */
class SkillTest extends BaseTestCase
{
    /**
     * @test
     */
    public function shouldIndexSkill()
    {
        $this->signIn();

        $this
            ->json('get', route('api.skills.index'), [], $this->headers())
            ->assertJson([
                'data' => [
                    ['type' => 'skill']
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
    public function shouldFilterIndexSkill()
    {
        $this->signIn();
        $data = ['filter' => ['query' => '']];

        $this
            ->json('get', route('api.skills.index'), $data, $this->headers())
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
    public function shouldShowSkill()
    {
        $this->signIn();
        $show = 1;

        $this
            ->json('get', route('api.skills.show', $show), [], $this->headers())
            ->assertJson([
                'data' => [
                    'type' => 'skill',
                    'id' => $show,
                ]
            ])
            ->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function shouldStoreSkill()
    {
        $this->signIn();
        $data = [];

        $this
            ->json('post', route('api.skills.store'), $data, $this->headers())
            ->assertJson(['data' => []])
            ->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('skills', [
        ]);
    }

    /**
     * @test
     */
    public function shouldErrorStoreSkill()
    {
        $this->signIn();

        $this
            ->json('post', route('api.skills.store'), [], $this->headers())
            ->assertJson([
                'errors' => [
                ]
            ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function shouldUpdateSkill()
    {
        $this->signIn();
        $update = 1;
        $data = [
        ];

        $this
            ->json('put', route('api.skills.update', $update), $data, $this->headers())
            ->assertJson(['data' => []])
            ->assertStatus(Response::HTTP_OK);

        $this->assertDatabaseHas('skills', [
            'id' => $update
        ]);
    }

    /**
     * @test
     */
    public function shouldErrorUpdateSkill()
    {
        $this->signIn();
        $update = 1;

        $this
            ->json('put', route('api.skills.update', $update), [], $this->headers())
            ->assertJson([
                'errors' => [
                ]
            ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function shouldDeleteSkill()
    {
        $this->signIn();
        $delete = 1;

        $this
            ->json('delete', route('api.skills.destroy', $delete), [], $this->headers())
            ->assertStatus(Response::HTTP_NO_CONTENT);

        $this->assertDatabaseMissing('skills', ['id' => $delete]);
    }

    /**
     * @test
     */
    public function shouldErrorsDeleteSkill()
    {
        $this->signIn();
        $delete = 999;

        $this
            ->json('delete', route('api.skills.destroy', $delete), [], $this->headers())
            ->assertJson([
                'errors' => [
                    $this->errorPageNotFound()
                ]
            ])
            ->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
