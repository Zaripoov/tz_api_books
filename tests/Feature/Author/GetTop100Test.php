<?php

namespace Tests\Feature\Author;

use Tests\Feature\ActionTestCase;

class GetTop100Test extends ActionTestCase
{
    public function getRouteName(): string
    {
        return 'api.v1.author.top-100.get';
    }

    public function test_get_top_100()
    {
        $response = $this->get(
            $this->getRouteUrl(),
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
                'paginate' => [
                ],
            ],
        ]);
    }

}
