<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index()
    {
        $title = "A Clean Blog";
        $small = "A Blog Theme Start By Bootstrap";
        $backgroundPhoto = '/img/home-bg.jpg';
        return view('index', compact('title', 'small', 'backgroundPhoto'));
    }

    public function about()
    {
        $title = "About Me";
        $small = "This is what I do.";
        $backgroundPhoto = '/img/about-bg.jpg';
        return view('about', compact('title', 'small', 'backgroundPhoto'));
    }

    public function contact()
    {
        $title = "Contact Me";
        $small = "Have questions? I have answers!";
        $backgroundPhoto = '/img/contact-bg.jpg';
        return view('contact', compact('title', 'small', 'backgroundPhoto'));
    }

    public function sample()
    {
        $title = "Man must explore, and this is exploration at it's greatest.";
        $subtitle = "Problems look mighty small from 150 miles up.";
        $small = "Posted by Start Bootstrap on December 16, 2023";
        $backgroundPhoto = '/img/post-bg.jpg';
        return view('sample', compact('title', 'subtitle', 'small', 'backgroundPhoto'));
    }
}
