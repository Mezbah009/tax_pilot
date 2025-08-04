<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use App\Models\Blog;
use App\Models\Job;
use App\Models\CaseStudy;
use App\Models\Product;

class SitemapController extends Controller
{
    public function generate()
    {
        ob_clean(); // Clear whitespace

        // Static URLs
        $staticUrls = [
            URL::to('/'),
            URL::to('/about-us'),
            URL::to('/enterprise-solutions'),
            URL::to('/fintech-solutions'),
            URL::to('/mobile-app-solutions'),
            URL::to('/ai-solutions'),
            URL::to('/system-solutions'),
            URL::to('/cyber-security-solutions'),
            URL::to('/services'),
            URL::to('/clients'),
            URL::to('/case-study'),
            URL::to('/blogs'),
            URL::to('/jobs'),
            URL::to('/contact-us'),
        ];

        // Start XML document
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" ';
        $sitemap .= 'xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . PHP_EOL;

        // Add Static URLs
        foreach ($staticUrls as $url) {
            $sitemap .= '    <url>' . PHP_EOL;
            $sitemap .= '        <loc>' . htmlspecialchars($url, ENT_XML1, 'UTF-8') . '</loc>' . PHP_EOL;
            $sitemap .= '        <lastmod>' . now()->toAtomString() . '</lastmod>' . PHP_EOL;
            $sitemap .= '        <changefreq>daily</changefreq>' . PHP_EOL;
            $sitemap .= '        <priority>0.8</priority>' . PHP_EOL;
            $sitemap .= '    </url>' . PHP_EOL;
        }

        // Add Products with Images & Titles
        $products = Product::select('link', 'updated_at', 'logo', 'title')->get();
        foreach ($products as $product) {
            $productUrl = URL::to('/products/' . $product->link);
            $imageUrl = asset('uploads/first_section/' . $product->logo);

            $sitemap .= '    <url>' . PHP_EOL;
            $sitemap .= '        <loc>' . htmlspecialchars($productUrl, ENT_XML1, 'UTF-8') . '</loc>' . PHP_EOL;
            $sitemap .= '        <lastmod>' . $product->updated_at->toAtomString() . '</lastmod>' . PHP_EOL;
            $sitemap .= '        <changefreq>daily</changefreq>' . PHP_EOL;
            $sitemap .= '        <priority>0.7</priority>' . PHP_EOL;

            // Add Product Image with Title
            if (!empty($product->logo)) {
                $sitemap .= '        <image:image>' . PHP_EOL;
                $sitemap .= '            <image:loc>' . htmlspecialchars($imageUrl, ENT_XML1, 'UTF-8') . '</image:loc>' . PHP_EOL;
                $sitemap .= '            <image:title>' . htmlspecialchars($product->title, ENT_XML1, 'UTF-8') . '</image:title>' . PHP_EOL;
                $sitemap .= '        </image:image>' . PHP_EOL;
            }

            $sitemap .= '    </url>' . PHP_EOL;
        }

        // Add Blogs with Images
        $blogs = Blog::select('slug', 'updated_at', 'image', 'title')->get();
        foreach ($blogs as $blog) {
            $blogUrl = URL::to('/blogs/' . $blog->slug);
            $blogImageUrl = asset('uploads/blogs/' . $blog->image);

            $sitemap .= '    <url>' . PHP_EOL;
            $sitemap .= '        <loc>' . htmlspecialchars($blogUrl, ENT_XML1, 'UTF-8') . '</loc>' . PHP_EOL;
            $sitemap .= '        <lastmod>' . $blog->updated_at->toAtomString() . '</lastmod>' . PHP_EOL;
            $sitemap .= '        <changefreq>daily</changefreq>' . PHP_EOL;
            $sitemap .= '        <priority>0.7</priority>' . PHP_EOL;

            if (!empty($blog->image)) {
                $sitemap .= '        <image:image>' . PHP_EOL;
                $sitemap .= '            <image:loc>' . htmlspecialchars($blogImageUrl, ENT_XML1, 'UTF-8') . '</image:loc>' . PHP_EOL;
                $sitemap .= '            <image:title>' . htmlspecialchars($blog->title, ENT_XML1, 'UTF-8') . '</image:title>' . PHP_EOL;
                $sitemap .= '        </image:image>' . PHP_EOL;
            }

            $sitemap .= '    </url>' . PHP_EOL;
        }

        // Add Case Studies
        $caseStudies = CaseStudy::select('slug', 'updated_at')->get();
        foreach ($caseStudies as $caseStudy) {
            $sitemap .= '    <url>' . PHP_EOL;
            $sitemap .= '        <loc>' . htmlspecialchars(URL::to('/case-study/' . $caseStudy->slug), ENT_XML1, 'UTF-8') . '</loc>' . PHP_EOL;
            $sitemap .= '        <lastmod>' . $caseStudy->updated_at->toAtomString() . '</lastmod>' . PHP_EOL;
            $sitemap .= '        <changefreq>daily</changefreq>' . PHP_EOL;
            $sitemap .= '        <priority>0.7</priority>' . PHP_EOL;
            $sitemap .= '    </url>' . PHP_EOL;
        }

        $sitemap .= '</urlset>';

        return response($sitemap, 200)->header('Content-Type', 'application/xml');
    }



    // robots.txt


    public function robots()
    {
        $content = "User-agent: *\n";
        $content .= "Disallow: /admin/\n";
        $content .= "Disallow: /login/\n";
        $content .= "Disallow: /register/\n";
        $content .= "Allow: /\n";
        $content .= "Sitemap: " . url('/sitemap.xml') . "\n";

        return response($content, 200)
            ->header('Content-Type', 'text/plain');
    }
}
