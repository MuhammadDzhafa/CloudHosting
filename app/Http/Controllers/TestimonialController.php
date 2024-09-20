<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('app.admin.testimonials.index', compact('testimonials'));
    }

    public function create(): View
    {
        return view('app.admin.testimonials.create');
    }

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
            $filePath = $request->file('picture')->store('testimonial_pictures', 'public');
            $testimonial->picture = $filePath;
        } else {
            $testimonial->picture = 'testimonial_pictures/default_picture.png'; // Ensure this default picture exists
        }

        $testimonial->occupation = $request->input('occupation');
        $testimonial->facebook = $request->input('facebook');
        $testimonial->instagram = $request->input('instagram');

        $testimonial->save();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function show(Testimonial $testimonial): View
    {
        return view('app.admin.testimonials.show', compact('testimonial'));
    }

    public function edit($id): View
    {
        $testimonial = Testimonial::where('testimonial_id', $id)->firstOrFail();
        return view('app.admin.testimonials.edit', compact('testimonial'));
    }


    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'domain_web' => 'required|string|max:255',
            'testimonial_text' => 'required|string',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'occupation' => 'nullable|string|max:255',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
        ]);

        // Find the testimonial by its primary key (testimonial_id)
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



    public function destroy($id)
    {
        // Find the testimonial by its primary key (testimonial_id)
        $testimonial = Testimonial::where('testimonial_id', $id)->firstOrFail();

        // Delete the picture from storage if it exists
        if ($testimonial->picture && Storage::disk('public')->exists($testimonial->picture)) {
            Storage::disk('public')->delete($testimonial->picture);
        }

        // Delete the testimonial from the database
        $testimonial->delete();

        // Redirect back to the testimonials index page with a success message
        return redirect()->route('testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }

}
