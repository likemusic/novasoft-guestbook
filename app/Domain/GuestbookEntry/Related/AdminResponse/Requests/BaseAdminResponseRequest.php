<?php

namespace App\Domain\GuestbookEntry\Related\AdminResponse\Requests;

use App\Domain\GuestbookEntry\Related\AdminResponse\AdminResponseTableColumnNamesConstants;
use Illuminate\Foundation\Http\FormRequest;

class BaseAdminResponseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            AdminResponseTableColumnNamesConstants::CONTENT => ['required', 'string'],
        ];
    }
}
