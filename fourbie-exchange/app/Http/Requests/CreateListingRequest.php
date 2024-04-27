<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateListingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|unique:listings|string|max:255',
            'status' => 'in:draft,publish',
            'content' => 'string|nullable',
            'excerpt' => 'string|nullable',
            'type' => 'in:listing,featured',
            'external_url' => 'url|nullable',
            'city' => 'string|nullable',
            'state' => 'string|nullable',
            'price' => 'numeric|nullable',
            'odometer' => 'numeric|nullable',
            'model_year' => 'numeric',
            'color' => 'string|nullable',
            'interior_color' => 'string|nullable',
            'transmission' => 'string|nullable',
            'fuel_type' => 'string|nullable',
            'engine' => 'string|nullable',
            'drivetrain' => 'string|nullable',
            'body_style' => 'string|nullable',
            'title_status' => 'string|nullable',
            'vin' => 'string|nullable',
            'dealer_id' => 'exists:dealers,id|nullable',
            'vehicle_make_id' => 'exists:vehicle_makes,id|nullable',
            'vehicle_model_id' => 'exists:vehicle_models,id|nullable',
            'vehicle_type_id' => 'exists:vehicle_types,id|nullable',
            'image_id' => 'exists:images,id|nullable',
            'seller_id' => 'exists:users,id|nullable'
        ];
    }
}
