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
            'status' => 'in:draft,publish',
            'content' => 'string|nullable',
            'excerpt' => 'string|nullable',
            'type' => 'in:listing,premium',
            'external_url' => 'url|nullable',

            // Validate all of the seller/dealer info.  We only need this if the dealer_id is not set
            'name' => 'required_without:dealer_id|string|nullable',
            'phone' => 'required_without:dealer_id|string|nullable',
            'email' => 'required_without:dealer_id|email|nullable',
            'city' => 'required_without:dealer_id|string|nullable',
            'state' => 'required_without:dealer_id|string|nullable',
            'zip' => 'required_without:dealer_id|string|nullable',

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
            'vehicle_make_id' => 'required|exists:vehicle_makes,id',
            'vehicle_model_id' => 'required|exists:vehicle_models,id',
            // 'vehicle_type_id' => 'exists:vehicle_types,id|nullable',
            'image_id' => 'exists:images,id|nullable',
            'seller_id' => 'exists:users,id|nullable'
        ];
    }
}
