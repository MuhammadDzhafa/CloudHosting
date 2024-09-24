<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;


class TestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('app.admin.testimonials.index', ['testimonials' => $testimonials]);
    }

    public function create(): View
    {
        return view('app.admin.testimonials.create');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'domain_web' => 'required|string|max:255',
    //         'testimonial_text' => 'required|string',
    //         'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    //     ]);

    //     $testimonial = new Testimonial();
    //     $testimonial->domain_web = $request->input('domain_web');
    //     $testimonial->testimonial_text = $request->input('testimonial_text');

    //     if ($request->hasFile('picture')) {
    //         $filePath = $request->file('picture')->store('testimonial_pictures', 'public');
    //         $testimonial->picture = $filePath;
    //     } else {
    //         $testimonial->picture = 'testimonial_pictures/default_picture.png'; // Ensure this default picture exists
    //     }

    //     $testimonial->occupation = $request->input('occupation');
    //     $testimonial->facebook = $request->input('facebook');
    //     $testimonial->instagram = $request->input('instagram');

    //     $testimonial->save();

    //     return redirect()->route('testimonials.index')->with('success', 'Testimonial created successfully.');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'domain_web' => 'required|string|max:255',
            'testimonial_text' => 'required|string',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $testimonial = new Testimonial();
        $testimonial->domain_web = $request->input('domain_web');
        $testimonial->testimonial_text = $request->input('testimonial_text');

        if ($request->hasFile('picture')) {
            // Buat nama file dengan timestamp + nama asli file
            $originalName = $request->file('picture')->getClientOriginalName();
            $fileName = time() . '_' . $originalName;

            // Simpan file dengan nama yang ditentukan
            $filePath = $request->file('picture')->storeAs('testimonial_pictures', $fileName, 'public');
            $testimonial->picture = $filePath;
        } else {
            // Gunakan default picture jika tidak ada file yang diunggah
            $testimonial->picture = 'testimonial_pictures/default_picture.png'; 
        }

        $testimonial->occupation = $request->input('occupation');
        $testimonial->facebook = $request->input('facebook');
        $testimonial->instagram = $request->input('instagram');

        $testimonial->save();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial created successfully.');
    }


    public function show(Testimonial $testimonial): View
    {
        return view('app.admin.testimonials.show', ['testimonial' => $testimonial]);
    }

    public function edit($id): View
    {
        $testimonial = Testimonial::where('testimonial_id', $id)->firstOrFail();
        return view('app.admin.testimonials.edit', ['testimonial' => $testimonial]);
    }

    public function update(Request $request, $id)
    {
        // Debugging: Check if the method is called
        Log::info('Update method called for ID: ' . $id);

        // Validate the request
        $request->validate([
            'domain_web' => 'required|string|max:255',
            'testimonial_text' => 'required|string',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'occupation' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
        ]);

        // Find the testimonial by its primary key
        $testimonial = Testimonial::where('testimonial_id', $id)->firstOrFail();

        // Update fields
        $testimonial->domain_web = $request->input('domain_web');
        $testimonial->testimonial_text = $request->input('testimonial_text');
        $testimonial->occupation = $request->input('occupation');
        $testimonial->facebook = $request->input('facebook');
        $testimonial->instagram = $request->input('instagram');

        // Handle the picture update
        if ($request->hasFile('picture')) {
            // Delete old picture if it exists
            if ($testimonial->picture && Storage::disk('public')->exists($testimonial->picture)) {
                Storage::disk('public')->delete($testimonial->picture);
            }

            // Store the new picture and update the path
            $filePath = $request->file('picture')->store('testimonial_pictures', 'public');
            $testimonial->picture = $filePath;
        }

        // Save the updated testimonial
        $testimonial->save();

        // Redirect with a success message
        return redirect()->route('testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }




    // public function destroy($id)
    // {
    //     $testimonial = Testimonial::where('testimonial_id', $id)->firstOrFail();

    //     if ($testimonial->picture && Storage::disk('public')->exists($testimonial->picture)) {
    //         Storage::disk('public')->delete($testimonial->picture);
    //     }

    //     $testimonial->delete();

    //     return redirect()->route('testimonials.index')
    //         ->with('success', 'Testimonial deleted successfully.');
    // }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete(); // Soft delete, mengisi kolom deleted_at
        return redirect()->route('testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }

    public function forceDelete($id)
    {
        $testimonial = Testimonial::withTrashed()->findOrFail($id);
        $testimonial->forceDelete(); // Hard delete, benar-benar menghapus dari database
        return redirect()->route('testimonials.index')->with('success', 'Testimonial permanently deleted.');
    }



}
