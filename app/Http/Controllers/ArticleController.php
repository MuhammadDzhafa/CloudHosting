<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    // Menampilkan daftar artikel
    public function index()
    {
        // Retrieve all articles from the database, ordered by 'created_at' in descending order (latest first)
        $articles = Article::orderBy('created_at', 'desc')->get();

        // Loop through the articles, sanitize the content with a limit
        $sanitizedArticles = $articles->map(function ($article) {
            // Sanitize the content with Purifier and limit to 150 characters
            $article->content = Str::limit(strip_tags(Purifier::clean($article->content)), 150);

            return $article;
        });

        // Pass the sanitized and limited articles data to the view
        return view('app.admin.articles.index', [
            'articles' => $sanitizedArticles,
        ]);
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
            'content' => 'required',
            'author' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:20480', // Validasi gambar, max 20MB
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
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:20480', // Validasi gambar, max 20MB
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
