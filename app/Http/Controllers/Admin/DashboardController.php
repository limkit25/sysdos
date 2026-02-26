<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung semua data
        $total_projects = Project::count();
        $total_services = Service::count();
        $total_testimonials = Testimonial::count();
        $total_messages = Contact::count();

        // Kirim ke view
        return view('admin.dashboard', compact(
            'total_projects', 
            'total_services', 
            'total_testimonials', 
            'total_messages'
        ));
    }
}