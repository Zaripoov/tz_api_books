<?php

namespace App\Http\Requests\Api\V1\Scan;

use Illuminate\Foundation\Http\FormRequest;

class ScanCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'isbn' => ['required', 'integer'],
            'author_full_name' => ['required', 'string', 'min:2', 'max:35'],
            'title' => ['required', 'string', 'min:2', 'max:35'],
            'year' => ['required', 'integer']
        ];
    }

    /**
     * @return int
     */
    public function getIsbn(): int
    {
        return $this->get('isbn');
    }

    /**
     * @return string
     */
    public function getAuthorFullName(): string
    {
        return $this->get('author_full_name');
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->get('title');
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->get('year');
    }
}
