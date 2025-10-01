<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'logo_url' => 'sometimes|url',
            'website' => 'sometimes|url',
            'social_links' => 'sometimes|array',
        ];
    }
    public function StoreCompany(){
        return DB::transaction(function(){
           $this->company->update([
                'name' => $this->name,
                'description' => $this->description,
                'logo_url' => $this->logo_url,
                'website' => $this->website,
                'social_links' =>  $this->social_links,
            ]);
        });
        

    }
}
