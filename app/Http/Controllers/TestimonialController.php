<?php

namespace App\Http\Controllers;

//import model client
use App\Models\Testimonial; 

//import return type View
use Illuminate\View\View;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        //get all clients
        $testimonials = Testimonial::latest()->paginate(10);

        //render view with products
        return view('testimonials.index', compact('testimonials'));
    }
}