<?php

use App\Http\Controllers\admin\AccreditationController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\AiSolutionController;
use App\Http\Controllers\admin\AwardController;
use App\Http\Controllers\admin\BlogAuthorController;
use App\Http\Controllers\admin\BlogCategoryController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\BlogTagController;
use App\Http\Controllers\admin\CaseStudyController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ClientCategoryController;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\ContactFormController;
use App\Http\Controllers\admin\CyberSecurityFirstSectionController;
use App\Http\Controllers\admin\CyberSecuritySecondSectionController;
use App\Http\Controllers\admin\HomeAboutSectionController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\HomeFirstSectionController;
use App\Http\Controllers\admin\HomeSecondSectionController;
use App\Http\Controllers\admin\HomeServicesSectionController;
use App\Http\Controllers\admin\HomeThirdSectionController;
use App\Http\Controllers\admin\JobController;
use App\Http\Controllers\admin\ManagementController;
use App\Http\Controllers\admin\NewsletterController;
use App\Http\Controllers\admin\NumberController;
use App\Http\Controllers\admin\OurJourneyController;
use App\Http\Controllers\admin\PracticeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductFirstSectionController;
use App\Http\Controllers\admin\QualityController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\ShowcaseController;
use App\Http\Controllers\admin\SiteSettingController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\SubSubCategoryController;
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\admin\TempImagesController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SitemapController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Frontend Routes-----------------------------------

Route::get('/', [FrontController::class, 'index'])->name('front.home');

Route::get('/about', [FrontController::class, 'about'])->name('front.about');
// Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');
Route::get('/pricing', [FrontController::class, 'pricing'])->name('front.pricing');
Route::get('/projects', [FrontController::class, 'projects'])->name('front.projects');
Route::get('/projects/{id}', [FrontController::class, 'projectDetails'])->name('front.project.details');
Route::get('/blog', [FrontController::class, 'blog'])->name('front.blog');
Route::get('/blog/{id}', [FrontController::class, 'blogDetails'])->name('front.blog.details');



// blog Frontend Routes
Route::get('/blog', [FrontController::class, 'blog'])->name('front.blog');
Route::get('/blog/search', [FrontController::class, 'searchBlog'])->name('front.blog.search');
Route::get('/blogs/category/{id}', [FrontController::class, 'categoryWiseBlog'])->name('front.blog.category');
Route::get('/blogs/tag/{id}', [FrontController::class, 'tagWiseBlog'])->name('front.blog.tag');
Route::get('/blog/{slug}', [FrontController::class, 'blogDetails'])->name('front.blog.details');
Route::post('/blog/comment/store', [FrontController::class, 'storeComment'])->name('blog.comment.store');


//newsletter subscription
Route::post('/subscribe', [FrontController::class, 'subscribe'])->name('newsletter.subscribe');


Route::get('/contact-us', [FrontController::class, 'contact'])->name('front.contact');
// Route::post('/contact-us', [FrontController::class, 'storeContactForm'])->name('contact_us.store');
Route::post('/contact/store', [FrontController::class, 'storeContactForm'])->name('store.contact.form');


Route::get('/appointment', [FrontController::class, 'appointment'])->name('front.appointment');
Route::get('/attorneys', [FrontController::class, 'attorneys'])->name('front.attorneys');
// Route::get('/attorneys/{id}', [FrontController::class, 'attorneyDetails'])->name('front.attorneys.details');
Route::get('/attorneys-details', [FrontController::class, 'attorneyDetails'])->name('front.attorneys.details');


Route::get('/practice', [FrontController::class, 'practice'])->name('front.practice');
Route::get('/practice/{slug}', [FrontController::class, 'practiceDetails'])->name('front.practice.details');



Route::get('/case-study', [FrontController::class, 'caseStudy'])->name('front.case_study');
Route::get('/case-study/{slug}', [FrontController::class, 'showCaseStudy'])->name('front.showCaseStudy');


Route::get('/testimonial', [FrontController::class, 'testimonial'])->name('front.testimonial');












//admin Routes---------------------------------------------------------------------

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('/change-password', [SettingController::class, 'showChangePassword'])->name('admin.showChangePassword');
        Route::post('/process-change-password', [SettingController::class, 'processChangePassword'])->name('admin.processChangePassword');
        Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');

        /*slider*/
        Route::get('/sliders', [SliderController::class, 'index'])->name('sliders.index');
        Route::get('/sliders/create', [SliderController::class, 'create'])->name('sliders.create');
        Route::post('/sliders', [SliderController::class, 'store'])->name('sliders.store');
        Route::get('/sliders/{sliders}/edit', [SliderController::class, 'edit'])->name('sliders.edit');
        Route::put('/sliders/{sliders}', [SliderController::class, 'update'])->name('sliders.update');
        Route::delete('/sliders/{sliders}', [SliderController::class, 'destroy'])->name('sliders.delete');
        // temp-image create
        Route::post('/upload-temp-image', [TempImagesController::class, 'create'])->name('temp-images.create');

        /* Team Members */
        Route::get('/team-members', [TeamController::class, 'index'])->name('team_members.index');
        Route::get('/team-members/create', [TeamController::class, 'create'])->name('team_members.create');
        Route::post('/team-members', [TeamController::class, 'store'])->name('team_members.store');
        Route::get('/team-members/{teamMember}/edit', [TeamController::class, 'edit'])->name('team_members.edit');
        Route::put('/team-members/{teamMember}', [TeamController::class, 'update'])->name('team_members.update');
        Route::delete('/team-members/{teamMember}', [TeamController::class, 'destroy'])->name('team_members.delete');

        // Home first section
        Route::get('/home_first_sections', [HomeFirstSectionController::class, 'index'])->name('home_first_sections.index');
        Route::get('/home_first_sections/create', [HomeFirstSectionController::class, 'create'])->name('home_first_sections.create');
        Route::post('/home_first_sections', [HomeFirstSectionController::class, 'store'])->name('home_first_sections.store');
        Route::get('/home_first_sections/{first_section}/edit', [HomeFirstSectionController::class, 'edit'])->name('home_first_sections.edit');
        Route::put('/home_first_sections/{first_section}', [HomeFirstSectionController::class, 'update'])->name('home_first_sections.update');
        Route::delete('/home_first_sections/{first_section}', [HomeFirstSectionController::class, 'destroy'])->name('home_first_sections.delete');
        // Home second section
        Route::get('/home_second_section', [HomeSecondSectionController::class, 'index'])->name('home_second_sections.index');
        Route::get('/home_second_section/create', [HomeSecondSectionController::class, 'create'])->name('home_second_sections.create');
        Route::post('/home_second_section', [HomeSecondSectionController::class, 'store'])->name('home_second_sections.store');
        Route::get('/home_second_section/{second_section}/edit', [HomeSecondSectionController::class, 'edit'])->name('home_second_sections.edit');
        Route::put('/home_second_section/{second_section}', [HomeSecondSectionController::class, 'update'])->name('home_second_sections.update');
        Route::delete('/home_second_section/{second_section}', [HomeSecondSectionController::class, 'destroy'])->name('home_second_sections.delete');


        // Home third section
        Route::get('/home-third-sections', [HomeThirdSectionController::class, 'index'])->name('home-third-sections.index');
        Route::get('/home-third-sections/create', [HomeThirdSectionController::class, 'create'])->name('home-third-sections.create');
        Route::post('/home-third-sections', [HomeThirdSectionController::class, 'store'])->name('home-third-sections.store');
        Route::get('/home-third-sections/{id}/edit', [HomeThirdSectionController::class, 'edit'])->name('home-third-sections.edit');
        Route::put('/home-third-sections/{id}', [HomeThirdSectionController::class, 'update'])->name('home-third-sections.update');
        Route::delete('/home-third-sections/{id}', [HomeThirdSectionController::class, 'destroy'])->name('home-third-sections.delete');


        // Home about section
        Route::get('/home-about', [HomeAboutSectionController::class, 'index'])->name('home-about.index');
        Route::get('/home-about/edit', [HomeAboutSectionController::class, 'edit'])->name('home-about.edit');
        Route::post('/home-about/update', [HomeAboutSectionController::class, 'update'])->name('home-about.update');


        // Route::resource('home-third-sections', HomeThirdSectionController::class);


        // Home Product section
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/products/{products}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{products}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{products}', [ProductController::class, 'destroy'])->name('products.delete');


        Route::get('/get-subcategories', [ProductController::class, 'getSubCategories'])->name('getSubCategories');
        Route::get('/get-sub-subcategories', [ProductController::class, 'getSubSubCategories'])->name('getSubSubCategories');



        // Product First section
        Route::get('/products/{id}/product_first_section', [ProductController::class, 'indexFirstSection'])->name('product_first_section.index');
        Route::get('/products/{id}/product_first_section/create', [ProductController::class, 'createFirstSection'])->name('product_first_section.create');
        Route::post('/products/{id}/product_first_section', [ProductController::class, 'storeFirstSection'])->name('product_first_section.store');
        Route::get('/product_first_sections/{section_id}/edit', [ProductController::class, 'editFirstSection'])->name('product_first_section.edit');
        Route::put('/products/product_first_sections/{section_id}', [ProductController::class, 'updateFirstSection'])->name('product_first_section.update');
        Route::delete('/product-first-section/{id}', [ProductController::class, 'destroyFirstSection'])->name('product_first_section.destroy');



        // Product Second section
        Route::get('/products/{id}/product_second_section', [ProductController::class, 'indexSecondSection'])->name('product_second_section.index');
        Route::get('/products/{id}/product_second_section/create', [ProductController::class, 'createSecondSection'])->name('product_second_section.create');
        Route::post('/products/{id}/product_second_section', [ProductController::class, 'storeSecondSection'])->name('product_second_section.store');
        Route::get('/product_second_section/{section_id}/edit', [ProductController::class, 'editSecondSection'])->name('product_second_section.edit');
        Route::put('/products/product_second_section/{section_id}', [ProductController::class, 'updateSecondSection'])->name('product_second_section.update');
        Route::delete('/product-second-section/{id}', [ProductController::class, 'destroySecondSection'])->name('product_second_section.destroy');



        // Product Third section
        Route::get('/products/{id}/product_third_section', [ProductController::class, 'indexThirdSection'])->name('product_third_section.index');
        Route::get('/products/{id}/product_third_section/create', [ProductController::class, 'createThirdSection'])->name('product_third_section.create');
        Route::post('/products/{id}/product_third_section', [ProductController::class, 'storeThirdSection'])->name('product_third_section.store');
        Route::get('/product_third_section/{section_id}/edit', [ProductController::class, 'editThirdSection'])->name('product_third_section.edit');
        Route::put('/products/product_third_section/{section_id}', [ProductController::class, 'updateThirdSection'])->name('product_third_section.update');
        Route::delete('/product-third-section/{id}', [ProductController::class, 'destroyThirdSection'])->name('product_third_section.destroy');



        // Product Fourth section
        Route::get('/products/{id}/product_fourth_section', [ProductController::class, 'indexFourthSection'])->name('product_fourth_section.index');
        Route::get('/products/{id}/product_fourth_section/create', [ProductController::class, 'createFourthSection'])->name('product_fourth_section.create');
        Route::post('/products/{id}/product_fourth_section', [ProductController::class, 'storeFourthSection'])->name('product_fourth_section.store');
        Route::get('/product_fourth_section/{section_id}/edit', [ProductController::class, 'editFourthSection'])->name('product_fourth_section.edit');
        Route::put('/products/product_fourth_section/{section_id}', [ProductController::class, 'updateFourthSection'])->name('product_fourth_section.update');
        Route::delete('/product-fourth-section/{id}', [ProductController::class, 'destroyFourthSection'])->name('product_fourth_section.destroy');



        // Product Fifth section
        Route::get('/products/{id}/product_fifth_section', [ProductController::class, 'indexFifthSection'])->name('product_fifth_section.index');
        Route::get('/products/{id}/product_fifth_section/create', [ProductController::class, 'createFifthSection'])->name('product_fifth_section.create');
        Route::post('/products/{id}/product_fifth_section', [ProductController::class, 'storeFifthSection'])->name('product_fifth_section.store');
        Route::get('/product_fifth_section/{section_id}/edit', [ProductController::class, 'editFifthSection'])->name('product_fifth_section.edit');
        Route::put('/products/product_fifth_section/{section_id}', [ProductController::class, 'updateFifthSection'])->name('product_fifth_section.update');
        Route::delete('/product-fifth-section/{id}', [ProductController::class, 'destroyFifthSection'])->name('product_fifth_section.destroy');


        // Product Sixth section
        Route::get('/products/{id}/product_sixth_section', [ProductController::class, 'indexSixthSection'])->name('product_sixth_section.index');
        Route::get('/products/{id}/product_sixth_section/create', [ProductController::class, 'createSixthSection'])->name('product_sixth_section.create');
        Route::post('/products/{id}/product_sixth_section', [ProductController::class, 'storeSixthSection'])->name('product_sixth_section.store');
        Route::get('/product_sixth_section/{section_id}/edit', [ProductController::class, 'editSixthSection'])->name('product_sixth_section.edit');
        Route::put('/products/product_sixth_section/{section_id}', [ProductController::class, 'updateSixthSection'])->name('product_sixth_section.update');
        Route::delete('/product-sixth-section/{id}', [ProductController::class, 'destroySixthSection'])->name('product_sixth_section.destroy');




        // Product Seventh section
        Route::get('/products/{id}/product_seventh_section', [ProductController::class, 'indexSeventhSection'])->name('product_seventh_section.index');
        Route::get('/products/{id}/product_seventh_section/create', [ProductController::class, 'createSeventhSection'])->name('product_seventh_section.create');
        Route::post('/products/{id}/product_seventh_section', [ProductController::class, 'storeSeventhSection'])->name('product_seventh_section.store');
        Route::get('/product_seventh_section/{section_id}/edit', [ProductController::class, 'editSeventhSection'])->name('product_seventh_section.edit');
        Route::put('/products/product_seventh_section/{section_id}', [ProductController::class, 'updateSeventhSection'])->name('product_seventh_section.update');
        Route::delete('/product-seventh-section/{id}', [ProductController::class, 'destroySeventhSection'])->name('product_seventh_section.destroy');


        // Home Service section
        Route::get('/home_services', [HomeServicesSectionController::class, 'index'])->name('home_services_section.index');
        Route::get('/home_services/create', [HomeServicesSectionController::class, 'create'])->name('home_services_section.create');
        Route::post('/home_services', [HomeServicesSectionController::class, 'store'])->name('home_services_section.store');
        Route::get('/home_services/{home_services}/edit', [HomeServicesSectionController::class, 'edit'])->name('home_services_section.edit');
        Route::put('/home_services/{home_services}', [HomeServicesSectionController::class, 'update'])->name('home_services_section.update');
        Route::delete('/home_services/{home_services}', [HomeServicesSectionController::class, 'destroy'])->name('home_services_section.delete');

        // Testimonials
        Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
        Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
        Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
        Route::get('/testimonials/{testimonials}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');
        Route::put('/testimonials/{testimonials}', [TestimonialController::class, 'update'])->name('testimonials.update');
        Route::delete('/testimonials/{testimonials}', [TestimonialController::class, 'destroy'])->name('testimonials.delete');

        // Clients
        Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
        Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
        Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
        Route::get('/clients/{clients}/edit', [ClientController::class, 'edit'])->name('clients.edit');
        Route::put('/clients/{clients}', [ClientController::class, 'update'])->name('clients.update');
        Route::delete('/clients/{clients}', [ClientController::class, 'destroy'])->name('clients.delete');
        //clientCategory
        Route::resource('client_categories', ClientCategoryController::class);
        Route::get('client_categories/toggle-status/{clientCategory}', [ClientCategoryController::class, 'toggleStatus'])->name('client_categories.toggleStatus');


        // Services
        Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
        Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
        Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
        Route::get('/services/{services}/edit', [ServiceController::class, 'edit'])->name('services.edit');
        Route::put('/services/{services}', [ServiceController::class, 'update'])->name('services.update');
        Route::delete('/services/{services}', [ServiceController::class, 'destroy'])->name('services.delete');

        // Blog
        Route::resource('blogs', BlogController::class);
        Route::resource('blog_authors', BlogAuthorController::class);
        Route::resource('blog_categories', BlogCategoryController::class);
        Route::resource('blog_tags', BlogTagController::class);
        Route::get('/comments', [BlogController::class, 'indexBlog'])->name('admin.comments.index');

        // Practices
        Route::resource('practices', PracticeController::class);







        // Case Study
        Route::get('/casestudy', [CaseStudyController::class, 'index'])->name('casestudy.index');
        Route::get('/casestudy/create', [CaseStudyController::class, 'create'])->name('casestudy.create');
        Route::post('/casestudy', [CaseStudyController::class, 'store'])->name('casestudy.store');
        Route::get('/casestudy/{blog}/edit', [CaseStudyController::class, 'edit'])->name('casestudy.edit');
        Route::put('/casestudy/{blog}', [CaseStudyController::class, 'update'])->name('casestudy.update');
        Route::delete('/casestudy/{blog}', [CaseStudyController::class, 'destroy'])->name('casestudy.delete');


        // Contact
        Route::resource('contact', ContactController::class)->except('show');

        // Number
        Route::get('/numbers', [NumberController::class, 'index'])->name('numbers.index');
        Route::get('/numbers/create', [NumberController::class, 'create'])->name('numbers.create');
        Route::post('/numbers', [NumberController::class, 'store'])->name('numbers.store');
        Route::get('/numbers/{numbers}/edit', [NumberController::class, 'edit'])->name('numbers.edit');
        Route::put('/numbers/{numbers}', [NumberController::class, 'update'])->name('numbers.update');
        Route::delete('/numbers/{numbers}', [NumberController::class, 'destroy'])->name('numbers.delete');

        // about management section
        Route::get('/managements', [ManagementController::class, 'index'])->name('managements.index');
        Route::get('/managements/create', [ManagementController::class, 'create'])->name('managements.create');
        Route::post('/managements', [ManagementController::class, 'store'])->name('managements.store');
        Route::get('/managements/{id}', [ManagementController::class, 'show'])->name('managements.show');
        Route::get('/managements/{managements}/edit', [ManagementController::class, 'edit'])->name('managements.edit');
        Route::put('/managements/{managements}', [ManagementController::class, 'update'])->name('managements.update');
        Route::delete('/managements/{managements}', [ManagementController::class, 'destroy'])->name('managements.delete');

        // about Accreditation section
        Route::get('/accreditation', [AccreditationController::class, 'index'])->name('accreditation.index');
        Route::get('/accreditation/create', [AccreditationController::class, 'create'])->name('accreditation.create');
        Route::post('/accreditation', [AccreditationController::class, 'store'])->name('accreditation.store');
        Route::get('/accreditation/{accreditation}/edit', [AccreditationController::class, 'edit'])->name('accreditation.edit');
        Route::put('/accreditation/{accreditation}', [AccreditationController::class, 'update'])->name('accreditation.update');
        Route::delete('/accreditation/{accreditation}', [AccreditationController::class, 'destroy'])->name('accreditation.delete');

        // about Awards section
        Route::get('/awards', [AwardController::class, 'index'])->name('awards.index');
        Route::get('/awards/create', [AwardController::class, 'create'])->name('awards.create');
        Route::post('/awards', [AwardController::class, 'store'])->name('awards.store');
        Route::get('/awards/{awards}/edit', [AwardController::class, 'edit'])->name('awards.edit');
        Route::put('/awards/{awards}', [AwardController::class, 'update'])->name('awards.update');
        Route::delete('/awards/{awards}', [AwardController::class, 'destroy'])->name('awards.delete');

        // about Quality Management section
        Route::get('/quality', [QualityController::class, 'index'])->name('quality.index');
        Route::get('/quality/create', [QualityController::class, 'create'])->name('quality.create');
        Route::post('/quality', [QualityController::class, 'store'])->name('quality.store');
        Route::get('/quality/{quality}/edit', [QualityController::class, 'edit'])->name('quality.edit');
        Route::put('/quality/{quality}', [QualityController::class, 'update'])->name('quality.update');
        Route::delete('/quality/{quality}', [QualityController::class, 'destroy'])->name('quality.delete');


        //about our journey
        Route::resource('journeys', OurJourneyController::class);

        //about showcases
        Route::resource('showcases', ShowcaseController::class);

        // Cyber Security First Section
        Route::get('/cyber_security', [CyberSecurityFirstSectionController::class, 'index'])->name('cyber_security.index');
        Route::get('/cyber_security/create', [CyberSecurityFirstSectionController::class, 'create'])->name('cyber_security.create');
        Route::post('/cyber_security', [CyberSecurityFirstSectionController::class, 'store'])->name('cyber_security.store');
        Route::get('/cyber_security/{cyber_security}/edit', [CyberSecurityFirstSectionController::class, 'edit'])->name('cyber_security.edit');
        Route::put('/cyber_security/{cyber_security}', [CyberSecurityFirstSectionController::class, 'update'])->name('cyber_security.update');
        Route::delete('/cyber_security/{cyber_security}', [CyberSecurityFirstSectionController::class, 'destroy'])->name('cyber_security.destroy');

        // Cyber Security second Section
        Route::get('/cyber_security_second/create', [CyberSecurityFirstSectionController::class, 'createSecondSection'])->name('secondSection.create');
        Route::post('/cyber_security_second', [CyberSecurityFirstSectionController::class, 'storeSecondSection'])->name('secondSection.store');
        Route::get('/cyber_security_second/{cyber_security_second}/edit', [CyberSecurityFirstSectionController::class, 'editSecondSection'])->name('secondSection.edit');
        Route::put('/cyber_security_second/{cyber_security_second}', [CyberSecurityFirstSectionController::class, 'updateSecondSection'])->name('secondSection.update');
        Route::delete('/cyber_security_second/{cyber_security_second}', [CyberSecurityFirstSectionController::class, 'destroySecondSection'])->name('secondSection.destroy');

        // ai solution First Section
        Route::get('/ai_solutions', [AiSolutionController::class, 'index'])->name('ai_solutions.index');
        Route::get('/ai_solutions/create', [AiSolutionController::class, 'create'])->name('ai_solutions.create');
        Route::post('/ai_solutions', [AiSolutionController::class, 'store'])->name('ai_solutions.store');
        Route::get('/ai_solutions/{ai_solutions}/edit', [AiSolutionController::class, 'edit'])->name('ai_solutions.edit');
        Route::put('/ai_solutions/{ai_solutions}', [AiSolutionController::class, 'update'])->name('ai_solutions.update');
        Route::delete('/ai_solutions/{ai_solutions}', [AiSolutionController::class, 'destroy'])->name('ai_solutions.destroy');

        // ai solution First Section
        // Route::get('/ai_solutions_second', [AiSolutionController::class, 'index'])->name('ai_solutions.index');
        Route::get('/ai_solutions_second/create', [AiSolutionController::class, 'createSecondSection'])->name('aiSecondSection.create');
        Route::post('/ai_solutions_second', [AiSolutionController::class, 'storeSecondSection'])->name('aiSecondSection.store');
        Route::get('/ai_solutions_second/{ai_solutions_second}/edit', [AiSolutionController::class, 'editSecondSection'])->name('aiSecondSection.edit');
        Route::put('/ai_solutions_second/{ai_solutions_second}', [AiSolutionController::class, 'updateSecondSection'])->name('aiSecondSection.update');
        Route::delete('/ai_solutions_second/{ai_solutions_second}', [AiSolutionController::class, 'destroySecondSection'])->name('aiSecondSection.destroy');




        // Jobs
        Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
        Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
        Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
        Route::get('/jobs/{jobs}/edit', [JobController::class, 'edit'])->name('jobs.edit');
        Route::put('/jobs/{jobs}', [JobController::class, 'update'])->name('jobs.update');
        Route::delete('/jobs/{jobs}', [JobController::class, 'destroy'])->name('jobs.delete');


        //category
        Route::resource('categories', CategoryController::class);
        Route::get('/categories/toggle-status/{category}', [CategoryController::class, 'toggleStatus'])->name('categories.toggleStatus');

        //subcategory
        Route::resource('subcategories', SubCategoryController::class);
        Route::get('subcategories/toggle-status/{subcategory}', [SubCategoryController::class, 'toggleStatus'])->name('subcategories.toggleStatus');
        Route::get('getSubCategories', [SubCategoryController::class, 'getSubCategories'])->name('subcategories.getSubCategories');
        //subsubcategory
        Route::resource('subsubcategories', SubSubCategoryController::class);
        Route::get('subsubcategories/{id}/toggle-status', [SubSubCategoryController::class, 'toggleStatus'])->name('subsubcategories.toggleStatus');



        //sitesetting
        Route::resource('site-settings', SiteSettingController::class);



        Route::get('/newsletter', [NewsletterController::class, 'index'])->name('admin.newsletter.index');
        Route::delete('/newsletter/{id}', [NewsletterController::class, 'destroy'])->name('admin.newsletter.destroy');
        Route::get('/admin/newsletter/export', [NewsletterController::class, 'export'])->name('admin.newsletter.export');


        Route::get('/contact-messages', [ContactFormController::class, 'index'])->name('admin.contact.index');
        Route::delete('/contact-messages/{id}', [ContactFormController::class, 'destroy'])->name('admin.contact.destroy');
        Route::get('/contact-forms/export', [ContactFormController::class, 'export'])->name('admin.contact.export');








        Route::get('/getSlug', function (Request $request) {
            $slug = '';
            if (!empty($request->title)) {
                $slug = Str::slug($request->title);  // Corrected to Str::slug
            }
            return response()->json([
                'status' => true,
                'slug' => $slug,
            ]);
        })->name('getSlug');
    });
});


Route::get('/test', function (Request $request) {
    dd($request->all());
});

Route::get('/sitemap.xml', [SitemapController::class, 'generate']);
Route::get('/robots.txt', [SitemapController::class, 'robots']);
