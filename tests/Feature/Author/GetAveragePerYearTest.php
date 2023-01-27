<?php

namespace Tests\Feature\Author;

use Tests\Feature\ActionTestCase;

class GetAveragePerYearTest extends ActionTestCase
{
    private function data(): array
    {
        return [
            'name' => 'Иван Иванов',
        ];
    }

    public function getRouteName(): string
    {
        return 'api.v1.author.average-per-year.get';
    }

    public function test_get_average_per_year()
    {
        $response = $this->get(
            $this->getRouteUrl($this->data()),
        );

        // Мы только утверждаем, что ответ возвращает 200
        // статус на данный момент.
        $response->assertOk();

        // Добавляем утверждение, которое будет доказывать, что мы получаем то, что нам нужно
        // из ответа.
        $response->assertJson([
            'state' => 0,
            'result' => [
                //'items' => [],
                //'paginate' => [],
            ],
        ]);
    }
}
