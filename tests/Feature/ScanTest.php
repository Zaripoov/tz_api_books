<?php

namespace Tests\Feature;


use App\Models\Book;
use App\Models\BookAuthor;
use Carbon\Carbon;

class ScanTest extends ActionTestCase
{
    private Book $bookFactory;
    private BookAuthor $bookAuthorFactory;

    private function setBookFactory()
    {
        $this->bookFactory = Book::factory()->make();
    }

    private function setBookAuthorFactory()
    {
        $this->bookAuthorFactory = BookAuthor::factory()->make();
    }

    private function data(): array
    {
        return [
            'isbn' => $this->bookFactory->isbn,
            'author_full_name' => $this->bookAuthorFactory->name,
            'title' => $this->bookFactory->title,
            'year' => $this->bookFactory->year,
        ];

    }
    public function getRouteName(): string
    {
        return 'api.v1.scan.post';
    }

    public function test_route()
    {
        $this->setBookAuthorFactory();
        $this->setBookFactory();

        $response = $this->postJson(
            $this->getRouteUrl(),
            $this->data()
        );

        // Мы только утверждаем, что ответ возвращает 200
        // статус на данный момент.
        $response->assertOk();

        $response->assertJson([
            'state' => 0,
            'result' => [
                [
                    'isbn' => $this->bookFactory->isbn,
                    'title' => $this->bookFactory->title,
                    'author' => $this->bookAuthorFactory->name,
                    'year' => $this->bookFactory->year,
                ]
            ],
        ]);
    }

}
