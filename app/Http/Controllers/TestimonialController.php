<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    function showTestimonials(){
        return view("testimonials.show");
    }
}
