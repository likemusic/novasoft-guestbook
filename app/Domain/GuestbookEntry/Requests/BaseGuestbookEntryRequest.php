<?php

namespace App\Domain\GuestbookEntry\Requests;

use App\Domain\GuestbookEntry\GuestbookEntryTableColumnNamesConstants;
use Illuminate\Foundation\Http\FormRequest;

class BaseGuestbookEntryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            GuestbookEntryTableColumnNamesConstants::CONTENT => ['required', 'string']
        ];
    }
}
