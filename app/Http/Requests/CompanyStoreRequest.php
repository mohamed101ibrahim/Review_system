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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo_url' => 'required|url',
            'website' => 'required|url',
            'social_links' => 'nullable|array',
        ];
    }
    public function StoreCompany(){
        return DB::transaction(function(){
           return $Company = Company::create([
                'name' => $this->name,
                'description' => $this->description,
                'logo_url' => $this->logo_url,
                'website' => $this->website,
                'social_links' =>  $this->social_links,
            ]);
        });

    }
}