<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customers;
use App\Http\Requests\CustomerStoreRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;


class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //All data
        $customers = customers::all();

        //Responce
        if (count($customers) > 0) {
            return response()->json(
                [
                    'status' => true,
                    'customers' => $customers
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'No customers found'
                ],
                404
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerStoreRequest $request)
    {
        //
        try {
            $imageName = str::random(32) . "." . $request->profile_image->getClientOriginalExtension();
            $gallery_img1 = str::random(32) . "." . $request->gallery_link1->getClientOriginalExtension();
            $gallery_img2 = str::random(32) . "." . $request->gallery_link2->getClientOriginalExtension();
            $gallery_img3 = str::random(32) . "." . $request->gallery_link3->getClientOriginalExtension();
            $gallery_img4 = str::random(32) . "." . $request->gallery_link4->getClientOriginalExtension();
            $gallery_img5 = str::random(32) . "." . $request->gallery_link5->getClientOriginalExtension();
            $pdf = str::random(32) . "." . $request->pdf->getClientOriginalExtension();

            //Create Customer
            customers::create([
                'profile_image' => $imageName,
                'name' => $request->name,
                'designation' => $request->designation,
                'description' => $request->description,
                'phone' => $request->phone,
                'whatsapp' => $request->whatsapp,
                'email' => $request->email,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'tik_tok' => $request->tik_tok,
                'twitter' => $request->twitter,
                'youtube' => $request->youtube,
                'linkedin' => $request->linkedin,
                'google_reviews' => $request->google_reviews,
                'website' => $request->website,
                'dummy' => $request->dummy,
                'address_link' => $request->address_link,
                'gallery_link1' => $gallery_img1,
                'gallery_link2' => $gallery_img2,
                'gallery_link3' => $gallery_img3,
                'gallery_link4' => $gallery_img4,
                'gallery_link5' => $gallery_img5,
                'pdf' => $pdf
            ]);

            //Save Image in Storage Folder
            Storage::disk('public')->put($imageName, file_get_contents($request->profile_image));
            Storage::disk('public')->put($gallery_img1, file_get_contents($request->gallery_link1));
            Storage::disk('public')->put($gallery_img2, file_get_contents($request->gallery_link2));
            Storage::disk('public')->put($gallery_img3, file_get_contents($request->gallery_link3));
            Storage::disk('public')->put($gallery_img4, file_get_contents($request->gallery_link4));
            Storage::disk('public')->put($gallery_img5, file_get_contents($request->gallery_link5));
            Storage::disk('public')->put($pdf, file_get_contents($request->pdf));

            //Responce
            return response()->json([
                'status' => true,
                'message' => 'Customer created successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Customer creation failed',
                'error' => $e
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Customer Data
        $customer = customers::find($id);
        if (!$customer) {
            //Responce
            return response()->json([
                'status' => false,
                'message' => 'Customer not found'
            ]);
        }

        //Responce
        return response()->json([
            'status' => true,
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function display(CustomerStoreRequest $request)
    {
        //Diplay all customers
        $customers = customers::all();
        if (!$customers->count()) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'No customers found'
                ],
                404
            );
        } else {
            return response()->json([
                'status' => true,
                'customers' => $customers
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(CustomerStoreRequest $request, string $id)
    // {
    //     //Find Customer
    //     try {
    //         $customer = customers::find($id);
    //         if (!$customer) {
    //             return response()->json([
    //                 'status' => false,
    //                 'message' => 'Customer not found'
    //             ]);
    //         }




    //         $customer->profile_image = $request->profile_image;
    //         $customer->name = $request->name;
    //         $customer->designation = $request->designation;
    //         $customer->description = $request->description;
    //         $customer->phone = $request->phone;
    //         $customer->whatsapp = $request->whatsapp;
    //         $customer->email = $request->email;
    //         $customer->instagram = $request->instagram;
    //         $customer->facebook = $request->facebook;
    //         $customer->tik_tok = $request->tik_tok;
    //         $customer->twitter = $request->twitter;
    //         $customer->youtube = $request->youtube;
    //         $customer->linkedin = $request->linkedin;
    //         $customer->google_reviews = $request->google_reviews;
    //         $customer->website = $request->website;
    //         $customer->dummy = $request->dummy;
    //         $customer->address_link = $request->address_link;
    //         $customer->gallery_link1 = $request->gallery_link1;
    //         $customer->gallery_link2 = $request->gallery_link2;
    //         $customer->gallery_link3 = $request->gallery_link3;
    //         $customer->gallery_link4 = $request->gallery_link4;
    //         $customer->gallery_link5 = $request->gallery_link5;
    //         $customer->pdf = $request->pdf;


    //         if ($request->profile_image) {

    //             $storage = Storage::disk('public');

    //             //public Storage
    //             if ($storage->exists($customer->profile_image)) {
    //                 $storage->delete($customer->profile_image);
    //             }
    //             //new image store
    //             $imageName = Str::random(32) . '.' . $request->profile_image->getClientOriginalExtension();
    //             $customer->profile_image = $imageName;

    //             //Store Image in Storage Folder
    //             $storage->put($imageName, file_get_contents($request->profile_image));
    //         } elseif ($request->gallery_link1) {

    //             $storage = Storage::disk('public');

    //             //public Storage
    //             if ($storage->exists($customer->gallery_link1)) {
    //                 $storage->delete($customer->gallery_link1);
    //             }
    //             //new image store
    //             $imageName = Str::random(32) . '.' . $request->gallery_link1->getClientOriginalExtension();
    //             $customer->gallery_link1 = $imageName;

    //             //Store Image in Storage Folder
    //             $storage->put($imageName, file_get_contents($request->gallery_link1));
    //         } elseif ($request->gallery_link2) {

    //             $storage = Storage::disk('public');

    //             //public Storage
    //             if ($storage->exists($customer->gallery_link2)) {
    //                 $storage->delete($customer->gallery_link2);
    //             }
    //             //new image store
    //             $imageName = Str::random(32) . '.' . $request->gallery_link2->getClientOriginalExtension();
    //             $customer->gallery_link2 = $imageName;

    //             //Store Image in Storage Folder
    //             $storage->put($imageName, file_get_contents($request->gallery_link2));
    //         } elseif ($request->gallery_link3) {

    //             $storage = Storage::disk('public');

    //             //public Storage
    //             if ($storage->exists($customer->gallery_link3)) {
    //                 $storage->delete($customer->gallery_link3);
    //             }
    //             //new image store
    //             $imageName = Str::random(32) . '.' . $request->gallery_link3->getClientOriginalExtension();
    //             $customer->gallery_link3 = $imageName;

    //             //Store Image in Storage Folder
    //             $storage->put($imageName, file_get_contents($request->gallery_link3));
    //         } elseif ($request->gallery_link4) {

    //             $storage = Storage::disk('public');

    //             //public Storage
    //             if ($storage->exists($customer->gallery_link4)) {
    //                 $storage->delete($customer->gallery_link4);
    //             }
    //             //new image store
    //             $imageName = Str::random(32) . '.' . $request->gallery_link4->getClientOriginalExtension();
    //             $customer->gallery_link4 = $imageName;

    //             // Store Image in Storage Folder
    //             $storage->put($imageName, file_get_contents($request->gallery_link4));
    //         } elseif ($request->gallery_link5) {

    //             $storage = Storage::disk('public');

    //             // Public Storage
    //             if ($storage->exists($customer->gallery_link5)) {
    //                 $storage->delete($customer->gallery_link5);
    //             }
    //             // New image store
    //             $imageName = Str::random(32) . '.' . $request->gallery_link5->getClientOriginalExtension();
    //             $customer->gallery_link5 = $imageName;

    //             // Store image in Storage Folder
    //             $storage->put($imageName, file_get_contents($request->gallery_link5));
    //         } elseif ($request->pdf) {

    //             $storage = Storage::disk('public');

    //             // Public Storage
    //             if ($storage->exists($customer->pdf)) {
    //                 $storage->delete($customer->pdf);
    //             }

    //             // New pdf store
    //             $pdfName = Str::random(32) . '.' . $request->pdf->getClientOriginalExtension();
    //             $customer->pdf = $pdfName;

    //             // Store pdf in Storage Folder
    //             $storage->put($pdfName, file_get_contents($request->pdf));
    //         }




    //         //Update
    //         $customer->save();

    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Customer updated successfully'
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Something went wrong',
    //             'error' => $e
    //         ]);
    //     }
    // }

    public function update(CustomerStoreRequest $request, string $id)
    {
        try {
            $customer = customers::find($id);

            // Check if the customer exists
            if (!$customer) {
                return response()->json([
                    'status' => false,
                    'message' => 'Customer not found'
                ]);
            }

            // Update the customer data
            $customer->profile_image = $request->profile_image;
            $customer->name = $request->name;
            $customer->designation = $request->designation;
            $customer->description = $request->description;
            $customer->phone = $request->phone;
            $customer->whatsapp = $request->whatsapp;
            $customer->email = $request->email;
            $customer->instagram = $request->instagram;
            $customer->facebook = $request->facebook;
            $customer->tik_tok = $request->tik_tok;
            $customer->twitter = $request->twitter;
            $customer->youtube = $request->youtube;
            $customer->linkedin = $request->linkedin;
            $customer->google_reviews = $request->google_reviews;
            $customer->website = $request->website;
            $customer->dummy = $request->dummy;
            $customer->address_link = $request->address_link;
            $customer->gallery_link1 = $request->gallery_link1;
            $customer->gallery_link2 = $request->gallery_link2;
            $customer->gallery_link3 = $request->gallery_link3;
            $customer->gallery_link4 = $request->gallery_link4;
            $customer->gallery_link5 = $request->gallery_link5;
            $customer->pdf = $request->pdf;

            // Check if the profile image file exists
            if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
                $storage = Storage::disk('public');

                // Delete existing profile image if it exists
                if ($storage->exists($customer->profile_image)) {
                    $storage->delete($customer->profile_image);
                }

                // Store new profile image
                $imageName = Str::random(32) . '.' . $request->profile_image->getClientOriginalExtension();
                $customer->profile_image = $imageName;
                $storage->put($imageName, file_get_contents($request->file('profile_image')));
            }

            if ($request->hasFile('gallery_link1') && $request->file('gallery_link1')->isValid()) {
                $storage = Storage::disk('public');

                // Delete existing gallery_link1 if it exists
                if ($storage->exists($customer->gallery_link1)) {
                    $storage->delete($customer->gallery_link1);
                }

                // Store new gallery_link1
                $imageName = Str::random(32) . '.' . $request->gallery_link1->getClientOriginalExtension();
                $customer->gallery_link1 = $imageName;
                $storage->put($imageName, file_get_contents($request->file('gallery_link1')->getRealPath()));
            }

            if ($request->hasFile('gallery_link2') && $request->file('gallery_link2')->isValid()) {
                $storage = Storage::disk('public');

                // Delete existing gallery_link2 if it exists
                if ($storage->exists($customer->gallery_link2)) {
                    $storage->delete($customer->gallery_link2);
                }

                // Store new gallery_link2
                $imageName = Str::random(32) . '.' . $request->gallery_link2->getClientOriginalExtension();
                $customer->gallery_link2 = $imageName;
                $storage->put($imageName, file_get_contents($request->file('gallery_link2')->getRealPath()));
            }
            if ($request->hasFile('gallery_link3') && $request->file('gallery_link3')->isValid()) {
                $storage = Storage::disk('public');

                // Delete existing gallery_link3 if it exists
                if ($storage->exists($customer->gallery_link3)) {
                    $storage->delete($customer->gallery_link3);
                }

                // Store new gallery_link3
                $imageName = Str::random(32) . '.' . $request->gallery_link3->getClientOriginalExtension();
                $customer->gallery_link3 = $imageName;
                $storage->put($imageName, file_get_contents($request->file('gallery_link3')->getRealPath()));
            }

            // Check and handle gallery_link4
            if ($request->hasFile('gallery_link4') && $request->file('gallery_link4')->isValid()) {
                $storage = Storage::disk('public');

                // Delete existing gallery_link4 if it exists
                if ($storage->exists($customer->gallery_link4)) {
                    $storage->delete($customer->gallery_link4);
                }

                // Store new gallery_link4
                $imageName = Str::random(32) . '.' . $request->gallery_link4->getClientOriginalExtension();
                $customer->gallery_link4 = $imageName;
                $storage->put($imageName, file_get_contents($request->file('gallery_link4')->getRealPath()));
            }

            // Check and handle gallery_link5
            if ($request->hasFile('gallery_link5') && $request->file('gallery_link5')->isValid()) {
                $storage = Storage::disk('public');

                // Delete existing gallery_link5 if it exists
                if ($storage->exists($customer->gallery_link5)) {
                    $storage->delete($customer->gallery_link5);
                }

                // Store new gallery_link5
                $imageName = Str::random(32) . '.' . $request->gallery_link5->getClientOriginalExtension();
                $customer->gallery_link5 = $imageName;
                $storage->put($imageName, file_get_contents($request->file('gallery_link5')->getRealPath()));
            }

            if ($request->hasFile('pdf') && $request->file('pdf')->isValid()) {
                $storage = Storage::disk('public');

                // Delete existing pdf if it exists
                if ($storage->exists($customer->pdf)) {
                    $storage->delete($customer->pdf);
                }

                // Store new pdf
                $pdfName = Str::random(32) . '.' . $request->pdf->getClientOriginalExtension();
                $customer->pdf = $pdfName;
                $storage->put($pdfName, file_get_contents($request->file('pdf')->getRealPath()));
            }

            // Save the customer data
            $customer->save();

            return response()->json([
                'status' => true,
                'message' => 'Customer updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        // Find the customer by ID
        $customer = Customers::find($id);

        // Check if the customer exists
        if (!$customer) {
            return response()->json([
                'status' => false,
                'message' => 'Customer not found'
            ]);
        }

        // Public Storage
        $storage = Storage::disk('public');

        // Delete the customer
        try {
            $customer->delete();
            return response()->json([
                'status' => true,
                'message' => 'Customer deleted successfully'
            ]);
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::error('Error deleting customer: ' . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Error deleting customer'
            ], 500);
        }
    }
}
