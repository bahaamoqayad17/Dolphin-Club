<?php

namespace App\Http\Controllers;

use App\Models\Pic;
use App\Models\Course;
use App\Models\Slider;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Trainer;
use App\Models\Testimonial;
use App\Models\Subscription;
// use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Barryvdh\DomPDF\PDF;


class SiteController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        $data = [];
        foreach ($settings as $setting) {
            $value = json_decode($setting->value, true);
            $data += [$setting->key => $value];
        }
        $sliders = Slider::all();
        $services = Service::orderByDesc('created_at')->take(5)->get();
        $galleries = Gallery::orderbyDesc('created_at')->take(6)->get();
        $articles = Article::where('flag', 0)->limit(3)->get();
        $products = Product::orderByDesc('created_at')->take(4)->get();
        $trainers = Trainer::paginate(4);
        $brands = Pic::all();
        $course = Course::where('flag', '<>', null)->orderBy('flag', 'asc')->get();
        return view('site.index', compact('articles', 'course', 'data', 'sliders', 'services', 'galleries', 'products', 'trainers', 'brands'));
    }

    public function contact()
    {
        $settings = Setting::all();
        $data = [];
        foreach ($settings as $setting) {
            $value = json_decode($setting->value, true);
            $data += [$setting->key => $value];
        }

        return view('site.contact', compact('data'));
    }

    public function about()
    {
        $data = [];
        $settings = Setting::all();
        foreach ($settings as $setting) {
            $value = json_decode($setting->value, true);
            $data += [$setting->key => $value];
        }
        $products = Product::orderByDesc('created_at')->take(4)->get();
        $trainers = Trainer::orderByDesc('created_at')->take(4)->get();
        $articles = Article::where('flag', 0)->limit(3)->get();

        return view('site.about', compact('articles', 'data', 'products', 'trainers'));
    }

    public function news()
    {
        $data = [];
        $settings = Setting::all();
        foreach ($settings as $setting) {
            $value = json_decode($setting->value, true);
            $data += [$setting->key => $value];
        }
        $articles = Article::where('flag', '<>', 2)->paginate(9);

        return view('site.news', compact('articles', 'data'));
    }

    public function gallery()
    {
        $data = [];
        $settings = Setting::all();
        foreach ($settings as $setting) {
            $value = json_decode($setting->value, true);
            $data += [$setting->key => $value];
        }
        $galleries = Gallery::paginate(6);

        return view('site.gallery', compact('data', 'galleries'));
    }

    public function services()
    {
        $data = [];
        $settings = Setting::all();
        foreach ($settings as $setting) {
            $value = json_decode($setting->value, true);
            $data += [$setting->key => $value];
        }
        $services = Service::paginate(6);
        $articles = Article::where('flag', 0)->limit(3)->get();
        $products = Product::orderByDesc('created_at')->take(4)->get();
        $trainers = Trainer::orderByDesc('created_at')->take(4)->get();

        return view('site.services', compact('articles', 'data', 'services', 'products', 'trainers'));
    }

    public function shop()
    {
        $products = Product::paginate(12);

        return view('site.shop', compact('products'));
    }
    public function testimonials()
    {
        $data = [];
        $settings = Setting::all();
        foreach ($settings as $setting) {
            $value = json_decode($setting->value, true);
            $data += [$setting->key => $value];
        }
        $testimonials = Testimonial::paginate(4);
        return view('site.testimonials', compact('testimonials', 'data'));
    }
    public function courses()
    {
        $data = [];
        $settings = Setting::all();
        foreach ($settings as $setting) {
            $value = json_decode($setting->value, true);
            $data += [$setting->key => $value];
        }
        $courses = Course::paginate(6);
        return view('site.courses', compact('courses', 'data'));
    }
    // public function createPDF(Subscription $sub)
    // {
    //     $pdf = app('dompdf.wrapper');

    //     $sub = Subscription::all()->first()->get();
    //     // share data to view
    //     view()->share('subsciption', $sub);
    //     $pdf->loadView('site.index', $sub);
    //     // download PDF file with download method
    //     $pdf->download('pdf_file.pdf');
    //     return redirect()->route('site.index');
    // }
}
