<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
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
        if (request()->isMethod('post')) {
            return [
                'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
                'name' => 'nullable|string',
                'designation' => 'nullable|string',
                'description' => 'nullable|string',
                'phone' => 'nullable|string',
                'whatsapp' => 'nullable|string',
                'email' => 'nullable|email',
                'instagram' => 'nullable|string',
                'facebook' => 'nullable|string',
                'tik_tok' => 'nullable|string',
                'twitter' => 'nullable|string',
                'youtube' => 'nullable|string',
                'linkedin' => 'nullable|string',
                'google_reviews' => 'nullable|string',
                'website' => 'nullable|string',
                'dummy' => 'nullable|string',
                'address_link' => 'nullable|string',
                'gallery_link1' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
                'gallery_link2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
                'gallery_link3' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
                'gallery_link4' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
                'gallery_link5' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
                'pdf' => 'nullable|mimes:pdf|max:10000',
            ];
        } else {
            return [
                'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
                'name' => 'nullable|string',
                'designation' => 'nullable|string',
                'description' => 'nullable|string',
                'phone' => 'nullable|string',
                'whatsapp' => 'nullable|string',
                'email' => 'nullable|email',
                'instagram' => 'nullable|string',
                'facebook' => 'nullable|string',
                'tik_tok' => 'nullable|string',
                'twitter' => 'nullable|string',
                'youtube' => 'nullable|string',
                'linkedin' => 'nullable|string',
                'google_reviews' => 'nullable|string',
                'website' => 'nullable|string',
                'dummy' => 'nullable|string',
                'address_link' => 'nullable|string',
                'gallery_link1' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
                'gallery_link2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
                'gallery_link3' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
                'gallery_link4' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
                'gallery_link5' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
                'pdf' => 'nullable|mimes:pdf|max:10000',
            ];
        }
    }

    public function messages()
    {
        if (request()->isMethod('post')) {
            return [
                'profile_image.image' => 'The profile image must be an image',
                'profile_image.mimes' => 'The profile image must be a file of type: jpeg, png, jpg, gif, webp, svg',
                'profile_image.max' => 'The profile image may not be greater than 2048 kilobytes',
                'gallery_link1.image' => 'The gallery image must be an image',
                'gallery_link1.mimes' => 'The gallery image must be a file of type: jpeg, png, jpg, gif, webp, svg',
                'gallery_link1.max' => 'The gallery image may not be greater than 2048 kilobytes',
                'gallery_link2.image' => 'The gallery image must be an image',
                'gallery_link2.mimes' => 'The gallery image must be a file of type: jpeg, png, jpg, gif, webp, svg',
                'gallery_link2.max' => 'The gallery image may not be greater than 2048 kilobytes',
                'gallery_link3.image' => 'The gallery image must be an image',
                'gallery_link3.mimes' => 'The gallery image must be a file of type: jpeg, png, jpg, gif, webp, svg',
                'gallery_link3.max' => 'The gallery image may not be greater than 2048 kilobytes',
                'gallery_link4.image' => 'The gallery image must be an image',
                'gallery_link4.mimes' => 'The gallery image must be a file of type: jpeg, png, jpg, gif, webp, svg',
                'gallery_link4.max' => 'The gallery image may not be greater than 2048 kilobytes',
                'gallery_link5.image' => 'The gallery image must be an image',
                'gallery_link5.mimes' => 'The gallery image must be a file of type: jpeg, png, jpg, gif, webp, svg',
                'gallery_link5.max' => 'The gallery image may not be greater than 2048 kilobytes',
                'pdf.mimes' => 'The pdf must be a file of type: pdf',
            ];
        } else {
            return [
                'profile_image.image' => 'The profile image must be an image',
                'gallery_link1.image' => 'The gallery image must be an image',
                'gallery_link2.image' => 'The gallery image must be an image',
                'gallery_link3.image' => 'The gallery image must be an image',
                'gallery_link4.image' => 'The gallery image must be an image',
                'gallery_link5.image' => 'The gallery image must be an image',
                'pdf.mimes' => 'The pdf must be a file of type: pdf',
            ];
        }
    }
}
