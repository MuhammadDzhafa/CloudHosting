<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
// use GuzzleHttp\Client; 


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
    //         // Buat nama file dengan timestamp + nama asli file
    //         $originalName = $request->file('picture')->getClientOriginalName();
    //         $fileName = time() . '_' . $originalName;

    //         // Simpan file dengan nama yang ditentukan
    //         $filePath = $request->file('picture')->storeAs('testimonial_pictures', $fileName, 'public');
    //         $testimonial->picture = $filePath;
    //     } else {
    //         // Gunakan default picture jika tidak ada file yang diunggah
    //         $testimonial->picture = 'testimonial_pictures/default_picture.png'; 
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
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:8048',
        ]);

        $testimonial = new Testimonial();
        $testimonial->domain_web = $request->input('domain_web');
        $testimonial->testimonial_text = $request->input('testimonial_text');

        if ($request->hasFile('picture')) {

            $file = $request->file('picture');
            // Buat nama file dengan timestamp + nama asli file
            $originalName = $request->file('picture')->getClientOriginalName();
            $fileName = time() . '_' . $originalName;            
            // Simpan file dengan nama yang ditentukan
            // $filePath = $request->file('picture')->storeAs('testimonial_pictures', $fileName, 'public');            
            $filePath = public_path("storage/testimonial_pictures/{$fileName}");
            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $image = $image->cover(400, 400);
            $image->toPng()->save($filePath);

            $testimonial->picture = $fileName;

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


    // function removeBackground($imagePath) {
    //     $apiKey = '6NxxF1g69decYxWFhpskVKZk'; // Ganti dengan API Key Anda
    //     $url = 'https://api.remove.bg/v1.0/removebg';

    //     // Siapkan cURL
    //     $ch = curl_init();

    //     // Konfigurasi cURL
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_POST, true);
        
    //     // Mempersiapkan file gambar untuk dikirim
    //     // Pastikan untuk menggunakan CURLFile tanpa namespace
    //     $postFields = [
    //         'image_file' => new \CURLFile($imagePath),
    //         'size' => 'auto'
    //     ];
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);

    //     // Menambahkan header
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, [
    //         'X-Api-Key: ' . $apiKey,
    //     ]);

    //     // Eksekusi cURL
    //     $response = curl_exec($ch);

    //     // Cek jika ada error
    //     if(curl_errno($ch)) {
    //         echo 'Error:' . curl_error($ch);
    //         return null;
    //     }

    //     // Tutup cURL
    //     curl_close($ch);

    //     // Simpan hasil gambar dengan background yang dihapus
    //     $outputPath = 'output.png'; // Ganti dengan nama file output yang diinginkan
    //     file_put_contents($outputPath, $response);

    //     return $outputPath;
    // }

    

    public function show(Testimonial $testimonial): View
    {
        return view('app.admin.testimonials.show', ['testimonial' => $testimonial]);
    }

    public function edit($id): View
    {
        $testimonial = Testimonial::where('testimonial_id', $id)->firstOrFail();
        return view('app.admin.testimonials.edit', ['testimonial' => $testimonial]);
    }

    // public function update(Request $request, $id)
    // {
    //     // Debugging: Check if the method is called
    //     Log::info('Update method called for ID: ' . $id);

    //     // Validate the request
    //     $request->validate([
    //         'domain_web' => 'required|string|max:255',
    //         'testimonial_text' => 'required|string',
    //         'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    //         'occupation' => 'nullable|string|max:255',
    //         'facebook' => 'nullable|string|max:255',
    //         'instagram' => 'nullable|string|max:255',
    //     ]);

    //     // Find the testimonial by its primary key
    //     $testimonial = Testimonial::where('testimonial_id', $id)->firstOrFail();

    //     // Update fields
    //     $testimonial->domain_web = $request->input('domain_web');
    //     $testimonial->testimonial_text = $request->input('testimonial_text');
    //     $testimonial->occupation = $request->input('occupation');
    //     $testimonial->facebook = $request->input('facebook');
    //     $testimonial->instagram = $request->input('instagram');

    //     // Handle the picture update
    //     if ($request->hasFile('picture')) {
    //         // Delete old picture if it exists
    //         if ($testimonial->picture && Storage::disk('public')->exists($testimonial->picture)) {
    //             Storage::disk('public')->delete($testimonial->picture);
    //         }

    //         // Store the new picture and update the path
    //         $filePath = $request->file('picture')->store('testimonial_pictures', 'public');
    //         $testimonial->picture = $filePath;
    //     }

    //     // Save the updated testimonial
    //     $testimonial->save();

    //     // Redirect with a success message
    //     return redirect()->route('testimonials.index')
    //         ->with('success', 'Testimonial updated successfully.');
    // }

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

            // Create new file name
            $originalName = $request->file('picture')->getClientOriginalName();
            $fileName = time() . '_' . $originalName;            
            
            // Define the file path
            $filePath = public_path("storage/testimonial_pictures/{$fileName}");
            
            // Process and save the new picture
            $manager = new ImageManager(new Driver());
            $image = $manager->read($request->file('picture'));
            $image = $image->cover(400, 400);
            $image->toPng()->save($filePath);

            // Update the picture field in the testimonial
            $testimonial->picture = $fileName;
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

    public function section9(): View
    {
        $testimonials = Testimonial::select('testimonial_text', 'picture', 'occupation', 'domain_web','facebook', 'instagram')->get();
        return view('app.hosting-plans.landing-page.section9', ['testimonials' => $testimonials]);
    }

}
