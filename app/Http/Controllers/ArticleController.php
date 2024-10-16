<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    // Menampilkan daftar artikel
    public function index()
    {
        $articles = Article::all();
        return view('app.admin.articles.index', compact('articles'));
    }

    // Menampilkan form untuk membuat artikel baru
    public function create()
    {
        return view('app.admin.articles.create');
    }

    // Menyimpan artikel baru ke database
    public function store(Request $request)
    {
        //  dd($request->all());
        // Validasi input
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required', // Tidak ada batasan panjang
            'author' => 'required|max:255',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:20480', // Validasi gambar
        ]);

        // Membuat artikel baru
        $articleData = $request->all();

        // Menyimpan gambar jika ada
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('article_pictures', 'public'); // Simpan ke storage/app/public/images
            $articleData['image'] = $path; // Menyimpan path gambar
        }

        Article::create($articleData);

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    // Menampilkan form untuk mengedit artikel
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('app.admin.articles.edit', compact('article'));
    }

    // Memperbarui artikel di database
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'required|max:255',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:20480', // Validasi gambar
        ]);

        // Mengupdate artikel
        $article = Article::findOrFail($id);
        $articleData = $request->all();

        // Menyimpan gambar baru jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($article->image) {
                Storage::disk('public')->delete($article->image); // Hapus gambar dari storage
            }

            $path = $request->file('image')->store('article_pictures', 'public'); // Simpan ke storage/app/public/images
            $articleData['image'] = $path; // Menyimpan path gambar
        }

        $article->update($articleData);

        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }

    // Menghapus artikel
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($article->image) {
            Storage::disk('public')->delete($article->image); // Hapus gambar dari storage
        }

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}
