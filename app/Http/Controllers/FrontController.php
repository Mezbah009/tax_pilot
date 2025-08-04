<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogAuthor;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\Category;
use App\Models\Client;
use App\Models\Comment;
use App\Models\ContactForm;
use App\Models\HomeFirstSection;
use App\Models\HomeServicesSection;
use App\Models\Newsletter;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\ContactFormSubmitted;
use App\Models\CaseStudy;
use App\Models\HomeSecondSection;
use App\Models\Number;
use App\Models\Practice;
use App\Models\User;

class FrontController extends Controller
{
    public function index()
    {
        $home_first_section = HomeFirstSection::all();
        $data['home_first_section'] = $home_first_section;

        $home_second_section = HomeSecondSection::all();
        $data['home_second_section'] = $home_second_section;

        $home_services_section = HomeServicesSection::all();
        $data['home_services_section'] = $home_services_section;

        $teamMembers = User::where('role', '!=', 2)->take(4)->get();
        $data['teamMembers'] = $teamMembers;

        $caseStudy = CaseStudy::latest()->take(3)->get();
        $data['caseStudy'] = $caseStudy;

        $practice = Practice::orderBy('id', 'asc')->take(6)->get();
        $data['practice'] = $practice;

        $numbers = Number::latest()->take(1)->get();
        $data['numbers'] = $numbers;


        $testimonials = Testimonial::all();
        $data['testimonials'] = $testimonials;

        $blogs = Blog::with(['author', 'categories'])
        ->where('is_published', true)
        ->orderByDesc('published_at')
        ->take(6)
        ->get();
        $data['blogs'] = $blogs;

        return view('front.home', $data);
    }

    public function about()
    {
        $home_second_section = HomeSecondSection::all();
        $data['home_second_section'] = $home_second_section;

        $home_services_section = HomeServicesSection::all();
        $data['home_services_section'] = $home_services_section;

        return view('front.about', $data);
    }




    public function contact()
    {
        $numbers = Number::latest()->take(1)->get();
        $data['numbers'] = $numbers;
        return view('front.contact', $data);
    }

    public function appointment()
    {
        return view('front.appointment');
    }

    public function attorneys()
    {
        $teamMembers = User::where('role', '!=', 2)->get();
        $data['teamMembers'] = $teamMembers;
        return view('front.attorneys', $data);
    }
    public function attorneyDetails()
    {
        return view('front.attorney-details');
    }

    public function practice()
    {
        $practice = Practice::all();
        $data['practice'] = $practice;
        return view('front.practice', $data);
    }

    public function practiceDetails($slug)
    {
        $practice = Practice::where('slug', $slug)->firstOrFail();
        return view('front.practice-details', compact('practice'));
    }


    public function caseStudy()
    {
        $caseStudy = CaseStudy::latest()->paginate(6);
        return view('front.case-study', ['caseStudy' => $caseStudy]);
    }


    public function showCaseStudy($slug, Request $request)
    {
        $query = CaseStudy::where('slug', $slug);

        if (!empty($request->get('keyword'))) {
            $query->where('description', 'like', '%' . $request->get('keyword') . '%');
        }

        $caseStudyPost = $query->firstOrFail();
        return view('front.case-details', compact('caseStudyPost'));
    }


    public function testimonial()
    {
        $testimonials = Testimonial::all();
        $data['testimonials'] = $testimonials;
        return view('front.testimonial', $data);
    }



    // public function blog()
    // {
    //     return view('front.blog');
    // }






    // public function pricing()
    // {
    //     $clients = Client::all();
    //     $data['clients'] = $clients;
    //     return view('front.pricing', $data);
    // }




    // public function blogDetails($slug)
    // {
    //     $blog = Blog::with(['author', 'categories', 'tags'])->where('slug', $slug)->firstOrFail();

    //     return view('front.blog-details', compact('blog'));
    // }



    // //------------blog section--------------------


    // public function blog()
    // {
    //     $blogs = Blog::with(['categories', 'tags', 'author'])
    //         ->where('is_published', 1)
    //         ->whereNotNull('published_at')
    //         ->latest()
    //         ->paginate(4);

    //     $data = $this->getSidebarData();

    //     return view('front.blog', array_merge(['blogs' => $blogs], $data));
    // }

    private function getSidebarData()
    {
        return [
            'categories' => BlogCategory::withCount('blogs')->get(),
            'recentPosts' => Blog::where('is_published', 1)
                ->whereNotNull('published_at')
                ->latest()
                ->take(5)
                ->get(),
            'tags' => BlogTag::withCount('blogs')->get(),
        ];
    }



    public function blog()
    {
        $blogs = Blog::with(['author', 'categories'])
            ->where('is_published', true)
            ->orderByDesc('published_at')
            ->paginate(6); // Or whatever number per page you want

        return view('front.blog', compact('blogs'));
    }


    public function categoryWiseBlog($id)
    {
        $category = BlogCategory::findOrFail($id);
        $blogs = $category->blogs()
            ->with(['categories', 'tags', 'author'])
            ->where('is_published', 1)
            ->whereNotNull('published_at')
            ->latest()
            ->paginate(4);
        $data = $this->getSidebarData();

        return view('front.blog', array_merge(['blogs' => $blogs, 'category' => $category], $data));
    }

    public function tagWiseBlog($id)
    {
        $tag = BlogTag::findOrFail($id);
        $blogs = $tag->blogs()
            ->with(['categories', 'tags', 'author'])
            ->where('is_published', 1)
            ->whereNotNull('published_at')
            ->latest()
            ->paginate(4);
        $data = $this->getSidebarData();

        return view('front.blog', array_merge(['blogs' => $blogs, 'tag' => $tag], $data));
    }


    public function searchBlog(Request $request)
    {
        $query = $request->input('q');

        $blogs = Blog::with(['categories', 'tags', 'author'])
            ->where(function ($qBuilder) use ($query) {
                $qBuilder->where('title', 'like', "%{$query}%")
                    ->orWhere('slug', 'like', "%{$query}%")
                    ->orWhere('content', 'like', "%{$query}%");
            })
            ->latest()
            ->paginate(4);


        $blogs->appends(['q' => $query]);



        $data = $this->getSidebarData();

        return view('front.blog', array_merge(['blogs' => $blogs, 'query' => $query], $data));
    }


    // Blog details page------------------------------

    // public function blogDetails($slug)
    // {
    //     $blog = Blog::where('slug', $slug)
    //         ->where('is_published', true)
    //         ->whereNotNull('published_at')
    //         ->firstOrFail();

    //     $categories = BlogCategory::withCount('blogs')->get();

    //     $recentPosts = Blog::where('is_published', true)
    //         ->whereNotNull('published_at')
    //         ->latest()
    //         ->take(5)
    //         ->get();

    //     $tags = BlogTag::withCount('blogs')->get();

    //     $comments = $blog->comments()
    //         ->whereNull('parent_id')
    //         ->with('replies')
    //         ->get();

    //     return view('front.blog-details', compact('blog', 'categories', 'recentPosts', 'tags', 'comments'));
    // }


    public function blogDetails($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('is_published', true)
            ->whereNotNull('published_at')
            ->firstOrFail();

        $previous = Blog::where('is_published', true)
            ->where('published_at', '<', $blog->published_at)
            ->orderBy('published_at', 'desc')
            ->first();

        $next = Blog::where('is_published', true)
            ->where('published_at', '>', $blog->published_at)
            ->orderBy('published_at', 'asc')
            ->first();

        $categories = BlogCategory::withCount('blogs')->get();
        $recentPosts = Blog::where('is_published', true)
            ->whereNotNull('published_at')
            ->latest()
            ->take(5)
            ->get();
        $tags = BlogTag::withCount('blogs')->get();

        $comments = $blog->comments()
            ->whereNull('parent_id')
            ->with('replies')
            ->get();

        return view('front.blog-details', compact(
            'blog',
            'previous',
            'next',
            'categories',
            'recentPosts',
            'tags',
            'comments'
        ));
    }





    public function storeComment(Request $request)
    {
        $validated = $request->validate([
            'blog_id' => 'required|exists:blogs,id',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'comment' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id',

        ]);

        Comment::create($validated);

        return back()->with('success', 'Your comment has been posted.');
    }

    // //------------end blog section--------------------


    // //------------newsletter section--------------------

    public function subscribe(Request $request)
    {
        // Validate email field
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
        ]);

        // Store subscriber
        Newsletter::create([
            'email' => $request->email,
        ]);

        // Redirect with success message
        return redirect()->back()->with('newsletter_success', 'You have successfully subscribed to our newsletter!');
    }





    // public function contact()
    // {
    //     $clients = Client::all();
    //     $data['clients'] = $clients;
    //     return view('front.contact', $data);
    // }



    public function storeContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'gridCheck' => 'accepted', // ✅ for checkbox only
        ]);

        // ✅ Save only required fields (exclude gridCheck)
        $contact = ContactForm::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // Mail sending (optional)
        // Mail::to('hmezbahoffice@gmail.com')->send(new ContactFormSubmitted($contact));

        return redirect()->back()->with('success', 'Your message has been sent. Thank you!');
    }
}
