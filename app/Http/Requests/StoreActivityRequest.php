<?php

namespace App\Http\Requests;

use App\Enums\Shelf;
use App\Models\Activity;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreActivityRequest extends FormRequest
{
    protected $errorBag = 'activityCreation';

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'date' => ['required', 'date', Rule::unique(Activity::class)->where(fn (Builder $query) => $query->where('shelf', $this->input('shelf')))],
            'shelf' => ['required', new Enum(Shelf::class)],
        ];
    }
}
