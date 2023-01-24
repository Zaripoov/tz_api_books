<?php

namespace App\Services\BookAuthor;

use App\Models\BookAuthor;
use Exception;
use Illuminate\Support\Facades\Log;

class SaveAuthorService
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @param $name
     */
    public function __construct($name)
    {
        $this->setName($name);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return BookAuthor|bool
     */
    public function create(): BookAuthor|bool
    {
        try {
            $author = new BookAuthor();
            $author->name = $this->getName();
            $author->save();

            return $author;
        }catch (Exception $exception)
        {
            Log::error('SaveBookAuthorService. Error while saving: ' . $exception->getMessage());

            return false;
        }
    }

}
