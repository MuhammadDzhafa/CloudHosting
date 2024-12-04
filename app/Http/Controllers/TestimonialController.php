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

    public function store(Request $request)
    {
        $request->validate([
            'domain_web' => 'required|string|max:255',
            'testimonial_text' => 'required|string',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Ubah max ke 2048 (2MB)
        ], [
            'picture.image' => 'File yang diunggah harus berupa gambar.',
            'picture.mimes' => 'Gambar harus memiliki format jpg, jpeg, atau png.',
            'picture.max' => 'Ukuran gambar maksimal 2MB.', // Sesuaikan pesan
        ]);

        // Tambahkan pengecekan ukuran file secara manual
        if ($request->hasFile('picture') && $request->file('picture')->getSize() > 20 * 1024 * 1024) {
            return back()->withErrors(['picture' => 'Ukuran gambar tidak boleh lebih dari 20MB.'])->withInput();
        }

        // Proses penyimpanan data
        $testimonial = new Testimonial();
        $testimonial->domain_web = $request->input('domain_web');
        $testimonial->testimonial_text = $request->input('testimonial_text');

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $originalName = $file->getClientOriginalName();
            $fileName = time() . '_' . $originalName;

            $directoryPath = public_path('storage/testimonial_pictures');
            if (!is_dir($directoryPath)) {
                mkdir($directoryPath, 0755, true);
            }

            $filePath = "{$directoryPath}/{$fileName}";

            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $image = $image->cover(400, 400);
            $image->toPng()->save($filePath);

            $testimonial->picture = $fileName;
        } else {
            $testimonial->picture = 'testimonial_pictures/default_picture.png';
        }

        $testimonial->occupation = $request->input('occupation');
        $testimonial->facebook = $request->input('facebook');
        $testimonial->instagram = $request->input('instagram');

        $testimonial->save();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial created successfully.');
    }



    public function edit($id): View
    {
        $testimonial = Testimonial::where('testimonial_id', $id)->firstOrFail();
        return view('app.admin.testimonials.edit', ['testimonial' => $testimonial]);
    }

    public function update(Request $request, $id)
    {
        Log::info('Update method called for ID', ['id' => $id]);

        $request->validate([
            'domain_web' => 'required|string|max:255',
            'testimonial_text' => 'required|string',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Ubah max ke 2048 (2MB)
            'occupation' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('picture') && $request->file('picture')->getSize() > 20 * 1024 * 1024) {
            return back()->withErrors(['picture' => 'Ukuran gambar tidak boleh lebih dari 20MB.'])->withInput();
        }

        $testimonial = Testimonial::where('testimonial_id', $id)->firstOrFail();
        $testimonial->domain_web = $request->input('domain_web');
        $testimonial->testimonial_text = $request->input('testimonial_text');
        $testimonial->occupation = $request->input('occupation');
        $testimonial->facebook = $request->input('facebook');
        $testimonial->instagram = $request->input('instagram');

        if ($request->hasFile('picture')) {
            if ($testimonial->picture && Storage::disk('public')->exists($testimonial->picture)) {
                Storage::disk('public')->delete($testimonial->picture);
            }

            $file = $request->file('picture');
            $originalName = $file->getClientOriginalName();
            $fileName = time() . '_' . $originalName;

            $filePath = public_path("storage/testimonial_pictures/{$fileName}");

            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $image = $image->cover(400, 400);
            $image->toPng()->save($filePath);

            $testimonial->picture = $fileName;
        }

        $testimonial->save();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully.');
    }



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

    public function section9()
    {
        $testimonials = Testimonial::select('testimonial_text', 'picture', 'occupation', 'domain_web', 'facebook', 'instagram')->get();
        return view('app.hosting-plans.landing-page.section9', ['testimonials' => $testimonials]);
    }
}
