<?php

namespace Tests\Feature\Book;

use App\Models\Book;
use App\Models\BookAuthor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\ActionTestCase;
use Tests\TestCase;

class GetListTest extends ActionTestCase
{
    public function getRouteName(): string
    {
        return 'api.v1.books.list.get';
    }

    private function data(): array
    {
        return [
            'year' => '2019-2022'
        ];
    }

    public function test_get_list(): void
    {
        $response = $this->getJson(
            $this->getRouteUrl($this->data())
        );

        // Мы только утверждаем, что ответ возвращает 200
        // статус на данный момент.
        $response->assertOk();

        // Добавляем утверждение, которое будет доказывать, что мы получаем то, что нам нужно
        // из ответа.
        $response->assertJson([
            'state' => 0,
            'result' => [
                'items' => [],
                'paginate' => []
            ],
        ]);

    }
}
