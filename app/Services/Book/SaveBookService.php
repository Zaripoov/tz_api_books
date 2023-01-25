<?php

namespace App\Services\Book;

use App\Models\Book;
use Exception;
use Illuminate\Support\Facades\Log;

class SaveBookService
{
    /**
     * @var string
     */
    private string $title;

    /**
     * @var int
     */
    private int $isbn;

    /**
     * @var int
     */
    private int $year;

    /**
     * @var int
     */
    private int $authorId;

    /**
     * @param $title
     * @param $isbn
     * @param $year
     * @param $authorId
     */
    public function __construct($title, $isbn, $year, $authorId)
    {
        $this->setTitle($title);
        $this->setIsbn($isbn);
        $this->setYear($year);
        $this->setAuthorId($authorId);

    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getIsbn(): int
    {
        return $this->isbn;
    }

    /**
     * @param int $isbn
     */
    public function setIsbn(int $isbn): void
    {
        $this->isbn = $isbn;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * @param int $authorId
     */
    public function setAuthorId(int $authorId): void
    {
        $this->authorId = $authorId;
    }

    /**
     * @return bool|Book
     */
    public function create(): bool|Book
    {
        try {
            $book = new Book();
            $book->title = $this->getTitle();
            $book->isbn = $this->getIsbn();
            $book->year = $this->getYear();
            $book->author_id = $this->getAuthorId();
            $book->save();

            return $book;
        }catch (Exception $exception){
            Log::error('SaveBookService. Error while saving: ' . $exception->getMessage());
            Log::channel(channel: 'scan')->error($exception->getMessage());

            return false;
        }
    }

}
