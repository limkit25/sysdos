<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Service;
use App\Models\Partner;
use App\Models\Setting;
use App\Models\Package; // Import
use App\Models\Slider;
use App\Models\Section;
use App\Models\Blog;


class HomeController extends Controller
{
    public function index()
{
    $site_settings = Setting::first();
    $services = Service::orderBy('id', 'desc')->get();
    $projects = Project::orderBy('created_at', 'desc')->take(6)->get();
    $testimonials = Testimonial::orderBy('id', 'desc')->take(3)->get();
    $partners = Partner::orderBy('order')->get(); // <--- BARU
    $packages = Package::all();
    
    $sliders = Slider::orderBy('order', 'asc')->get();
    $sections = Section::where('is_visible', true)->orderBy('order', 'asc')->get();
    $blogs = Blog::latest()->take(3)->get();

    return view('landing', compact(
        'site_settings', 
        'services', 
        'projects', 
        'testimonials', 
        'partners', // <--- BARU
        'packages',
        'sliders',
        'sections',
        'blogs'
    ));
}
public function showProject($id)
    {
        $project = Project::findOrFail($id);
        $site_settings = Setting::first(); // Tetap butuh ini untuk layout
        
        return view('project-detail', compact('project', 'site_settings'));
    }
    public function showBlog($slug)
    {
        // Cari artikel berdasarkan slug (judul di link)
        $blog = Blog::where('slug', $slug)->firstOrFail();
        
        $site_settings = Setting::first();

        return view('blog-detail', compact('blog', 'site_settings'));
    }
}
