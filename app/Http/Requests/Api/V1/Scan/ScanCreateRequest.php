<?php

namespace App\Http\Requests\Api\V1\Scan;

use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Validator;
use Psr\Log\LoggerInterface;

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
     * Надстройка экземпляра валидатора.
     *
     * @param Validator $validator
     * @return void
     */
    public function withValidator(Validator $validator): void
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->isNotEmpty()) {
                $this->log('scan')->error($validator->errors());
            }
        });
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

    private function log(string $channel): LoggerInterface
    {
        return Log::channel(channel: $channel);
    }

}
