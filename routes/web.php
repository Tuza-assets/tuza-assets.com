<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\Design\DesignController;
use App\Http\Controllers\tenants\PropertyController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MagazineController;
use App\Http\Controllers\Admin\ContactController;
use App\Models\Contact;
use App\Models\Design;
use App\Models\Blog;
use App\Models\Lead;
use App\Models\PropertyOnSell;
use Illuminate\Http\Request;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ZonningController;
use App\Http\Controllers\Admin\MagazineDownloadController;
use App\Http\Controllers\PropertyOnSellController;
use App\Http\Controllers\ProjectProposalController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReservationController;
use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Http\Controllers\MailchimpController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\partener\PartnerPropertyController;

Route::get('link/authenticate/admin/{user}', function (Request $request, $user) {
    if (!$request->hasValidSignature()) {
        abort(401);
    }

    $user = User::findOrFail($user);

    Auth::login($user);
    $request->session()->regenerate();
    return redirect()->route('dashboard');
})->name('admin.authenticate.guest');

Route::post('/subscribe', [App\Http\Controllers\MailchimpController::class, 'subscribe'])->name('subscribe');

Route::get('generate-sitemap', function () {
    SitemapGenerator::create('https://tuza-assets.com')->writeToFile(public_path('sitemap.xml'));
    return 'Sitemap generated successfully';
});

Route::post('/submit-booking', [BookingController::class, 'submit'])->name('submit.booking');

Route::get('sitemap.xml', function () {
    if (file_exists(public_path('sitemap.xml'))) {
        return response()->file(public_path('sitemap.xml'), [
            'Content-Type' => 'application/xml',
        ]);
    }
    abort(404);
});

Route::get('debug-paths', function () {
    return [
        'public_path' => public_path('sitemap.xml'),
        'storage_path' => storage_path('app/public/sitemap.xml'),
        'base_path' => base_path('public/sitemap.xml'),
        'file_exists' => file_exists(public_path('sitemap.xml')),
        'is_readable' => is_readable(public_path('sitemap.xml')),
    ];
});

Route::get('/property/{id}/reserve', [ReservationController::class, 'showReservationPage'])->name('property.reserve');
Route::post('/property/complete-reservation', [ReservationController::class, 'completeReservation'])->name('reservation.complete');

Route::get('/property/payment', [ReservationController::class, 'showPaymentPage'])->name('reservation.payment');
Route::post('/property/process-payment', [ReservationController::class, 'processPayment'])->name('reservation.process-payment');
Route::get('/property/confirmation', [ReservationController::class, 'showConfirmation'])->name('reservation.confirmation');

// PAYMENT CONTROLLERS

Route::get('payment/invoice/{id}/finish', [PayPalController::class, 'processTransaction'])->name('payment.complete');
Route::get('payment/invoice/cancel', [PayPalController::class, 'cancelTransaction'])->name('payment.cancelTransaction');
Route::get('payment/invoice/finish/success', [PayPalController::class, 'successTransaction'])->name('payment.successTransaction');

// KPay routes
Route::get('payment/kpay/{id}/process', [KPayController::class, 'processPayment'])->name('payment.kpay.process');
Route::get('payment/kpay/check-status/{refid}', [KPayController::class, 'checkStatus'])->name('transaction.payment.checkStatus');
Route::post('payment/kpay/callback', [KPayController::class, 'callbackHandler'])->name('transaction.payment.callback');

Route::post('payment/kpay/process/initiate', [KPayController::class, 'initiatePayment'])->name('payment.kpay.process.initiate');
Route::get('payment/kpay/coming-soon', function () {
    return view('payments.kpay.coming_soon');
})->name('payment.kpay.coming.soon');

Route::get('admin/magazine-downloads/export-excel', [MagazineDownloadController::class, 'exportExcel'])->name('admin.magazine-downloads.export-excel');
Route::get('admin/magazine-downloads/export-pdf', [MagazineDownloadController::class, 'exportPdf'])->name('admin.magazine-downloads.export-pdf');
Route::get('login/sell', [LoginController::class, 'sell_index'])->name('admin.login');

Route::post('/favority/{productId}', [PropertyOnSellController::class, 'favorite'])->name('properties.favority');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        Route::get('/', [LeadController::class, 'index'])->name('welcome');

        Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
            Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard');
            Route::prefix('admin')
                ->name('admin.')
                ->group(function () {
                    Route::get('/user', [UserController::class, 'index'])->name('user');
                    Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
                    Route::put('/users/update/{user}', [UserController::class, 'update'])->name('user.update');
                    Route::get('design/index', [DesignController::class, 'index'])->name('design');

                    Route::delete('/admin/magazine-downloads/{id}', [MagazineController::class, 'destroy2'])->name('magazine-downloads.destroy');

                    Route::get('Project/', [ProjectProposalController::class, 'index'])->name('project.proposal');

                    Route::get('proect-proposals/create', [ProjectProposalController::class, 'create'])->name('project-proposals.create');
                    Route::post('proect-proposals', [ProjectProposalController::class, 'store'])->name('project-proposals.store');
                    Route::delete('proect-proposals/{proposal}', [ProjectProposalController::class, 'destroy'])->name('project-proposals.destroy');

                    Route::get('/portfolios', [PortfolioController::class, 'index'])->name('portfolios.index');
                    Route::get('/portfolios/create', [PortfolioController::class, 'create'])->name('portfolios.create');
                    Route::post('/portfolios', [PortfolioController::class, 'store'])->name('portfolios.store');
                    Route::delete('/portfolios/{portfolio}', [PortfolioController::class, 'destroy'])->name('portfolios.destroy');

                    Route::get('Magazine', [MagazineController::class, 'index'])->name('magazine');
                    Route::get('Magazine/add', [MagazineController::class, 'create'])->name('magazine.create');
                    Route::post('Magazine/store', [MagazineController::class, 'store'])->name('magazine.store');
                    Route::get('Magazine/edit/{magazine}', [MagazineController::class, 'edit'])->name('magazine.edit');
                    Route::put('Magazine/update', [MagazineController::class, 'update'])->name('magazine.update');
                    Route::delete('Magazinee/{magazine}', [MagazineController::class, 'destroy'])->name('magazine.destroy');
                    Route::post('/send-download-link/{magazine}', [MagazineController::class, 'sendDownloadLink'])->name('download.link');
                    Route::get('chart/index', [LeadController::class, 'index2'])->name('chart');
                    Route::get('chart/edit/{id}', [LeadController::class, 'editChart'])->name('chart.edit2');
                    Route::put('chart/{id}', function (Request $request, $id) {
                        $lead = Lead::findOrFail($id);
                        if ($lead) {
                            $lead->update([
                                'rental_properties' => $request->get('rental_properties'),
                                'letting_properties' => $request->get('letting_properties'),
                                'completed_projects' => $request->get('completed_projects'),
                                'plots_on_bid' => $request->get('plots_on_bid'),
                                'date' => $request->get('date'),
                            ]);
                            return redirect()->back();
                        }
                    })->name('chart.edit');
                    Route::delete('chart/{id}', [LeadController::class, 'destroy'])->name('chart.destroy');
                    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
                    Route::get('/contact/us', [ContactController::class, 'index'])->name('contact');

                    Route::get('properties', [PropertyOnSellController::class, 'index'])->name('properties.index');
                    Route::get('properties/create', [PropertyOnSellController::class, 'create'])->name('properties.create');
                    Route::post('properties', [PropertyOnSellController::class, 'store'])->name('properties.store');
                    Route::get('properties/{property}', [PropertyOnSellController::class, 'show'])->name('properties.show');
                    Route::get('properties/{property}/edit', [PropertyOnSellController::class, 'edit'])->name('properties.edit');
                    Route::put('properties/{property}', [PropertyOnSellController::class, 'update'])->name('properties.update');
                    Route::delete('properties/{property}', [PropertyOnSellController::class, 'destroy'])->name('properties.destroy');

                    Route::get('/blogs/index', [BlogController::class, 'index'])->name('blogs.index');
                    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
                    Route::post('/blog/store', [BlogController::class, 'store'])->name('blogs.store');
                    Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');
                    Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
                    Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
                    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');

                    Route::post('/categories/store', [BlogController::class, 'categoriesstore'])->name('blog-categories.store');

                    Route::get('Zoning/index', [ZonningController::class, 'index'])->name('Zonning');
                    Route::get('/Zoning/create', [ZonningController::class, 'create'])->name('Zonning.create');
                    Route::post('/Zoning/store', [ZonningController::class, 'store'])->name('Zonning.store');
                    Route::get('/Zoning/{Zonning}', [ZonningController::class, 'show'])->name('Zonning.show');
                    Route::get('/Zoning/{Zonning}/edit', [ZonningController::class, 'edit'])->name('Zonning.edit');
                    Route::put('/Zoning/{Zonning}', [ZonningController::class, 'update'])->name('Zonning.update');
                    Route::delete('/Zoning/{Zonning}', [ZonningController::class, 'destroy'])->name('Zonning.destroy');
                });
        });
        Route::prefix('partner')
            ->name('partner.')
            ->group(function () {
                // List all properties
                Route::get('/properties', [PartnerPropertyController::class, 'index'])->name('properties.index');
                // Show create form
                Route::get('/properties/create', [PartnerPropertyController::class, 'create'])->name('properties.create');
                // Store new property
                Route::post('/properties', [PartnerPropertyController::class, 'store'])->name('properties.store');
                // Show single property
                Route::get('/properties/{property}', [PartnerPropertyController::class, 'show'])->name('properties.show');
                // Show edit form
                Route::get('/properties/{property}/edit', [PartnerPropertyController::class, 'edit'])->name('properties.edit');
                // Update property
                Route::put('/properties/{property}', [PartnerPropertyController::class, 'update'])->name('properties.update');
                // Delete property
                Route::delete('/properties/{property}', [PartnerPropertyController::class, 'destroy'])->name('properties.destroy');
            });

        Route::post('/download-link/{magazine}', [MagazineController::class, 'sendDownloadLink'])->name('download.link');
        Route::get('/Construction/Zoning', function () {
            return view('zoning');
        })->name('Zoning2');

        Route::get('/about-us', function () {
            return view('about');
        })->name('about');

        Route::get('/Bestkeptsecret', function () {
            return view('bestkeptsecret.index');
        })->name('Bestkeptsecret');

        Route::get('/rental-collection', function () {
            return view('rental-collection');
        })->name('rental-collection');

        Route::get('/property-inspection', function () {
            return view('property-inspection');
        })->name('property-inspection');

        Route::get('/property-inspection-contact', function () {
            return view('property-inspection-contact');
        })->name('property-inspection-contact');

        Route::get('/our-designs', function () {
            return view('blogs');
        })->name('blogs');

        // new pages
        Route::get('all/blogs', [BlogController::class, 'all_blogs'])->name('all_blogs');
        Route::get('all/properties', [PropertyController::class, 'all_property'])->name('all_property');

        Route::get('/blog/{slug}', function ($slug) {
            $blog = Blog::where('slug', $slug)->firstOrFail();
            return view('blogs.detail', compact('blog'));
        })->name('blogdetail');

        Route::get('/policy', function () {
            return view('policy');
        })->name('policy');

        Route::get('/disclaimer', function () {
            return view('disclaimer');
        })->name('disclaimer');

        Route::get('/faqs', function () {
            return view('faqs');
        })->name('faqs');

        Route::get('/our-design-details/{id}', function ($id) {
            $design = Design::findOrFail($id);
            return view('blog-details', compact('design'));
        })->name('blog.details');

        Route::get('/buy-plot-on-bid', function () {
            return view('buyplot.index');
        })->name('BuyPlot');

        Route::get('/diaspora', function () {
            try {
                $propertyResponse = Http::withOptions([
                    'verify' => false,
                    'timeout' => 30,
                    'connect_timeout' => 10,
                    'retry' => 3,
                    'retry_delay' => 1000,
                ])->get('http://property.tuza-assets.com/api/v1/properties');

                if ($propertyResponse->successful()) {
                    $properties = $propertyResponse->json();
                } else {
                    Log::error('Failed to fetch properties for diaspora: ' . $propertyResponse->status() . ' - ' . $propertyResponse->body());
                    $properties = [];
                }
            } catch (\Exception $e) {
                Log::error('Exception while fetching properties for diaspora: ' . $e->getMessage());
                $properties = [];
            }

            return view('diaspora.index', compact('properties'));
        })->name('diaspora');
        Route::get('/diplomats', function () {
            return view('diplomats.index');
        })->name('diplomats');
        Route::get('/tenant-view', function () {
            return view('tenant.index');
        })->name('tenant.view');

        Route::get('/insurance-and-security', function () {
            return view('insurance&secturity.index');
        })->name('insurance&secturity.view');

        Route::get('/legal-issues-facilitation', function () {
            return view('legal-issues-facilitation.index');
        })->name('legal-issues-facilitation');

        Route::get('/bank-loan-application', function () {
            return view('bank-loan-application.index');
        })->name('bank-loan-application');

        Route::get('/terms-and-conditions', function () {
            return view('terms');
        })->name('terms-and-conditions');
        Route::get('/site-map', function () {
            return view('sitemap');
        })->name('site-map');

        Route::get('/Contact', function () {
            return view('Contact');
        })->name('Contact');

        Route::get('/blogs/all', function () {
            $blogs = Blog::all();
            return view('blogstest', compact('blogs'));
        })->name('blogs.all');

        Route::get('/property-on-sell', function () {
            $properties = PropertyOnSell::all(); // Fetch all properties from the database
            $availableCount = PropertyOnSell::where('availability', 'available')->count();
            $underNegotiationCount = PropertyOnSell::where('availability', 'under_negotiation')->count();
            $soldCount = PropertyOnSell::where('availability', 'sold')->count();
            $propertyTypeCounts = PropertyOnSell::select('property_type', DB::raw('count(*) as total'))->groupBy('property_type')->pluck('total', 'property_type')->all();
            return view('new-propertyonsell', compact('properties', 'availableCount', 'underNegotiationCount', 'soldCount', 'propertyTypeCounts')); // Pass properties to the 'test' Blade template
        })->name('new-propertyonsell');

        Route::get('/propert/{id}', function ($id) {
            $relatedProperties = PropertyOnSell::where('id', '!=', $id)->inRandomOrder()->take(6)->get();
            $property = PropertyOnSell::findOrFail($id);
            return view('new-propertyonselldetail', compact('property', 'relatedProperties'));
        })->name('new-propertyonselldetail');

        Route::get('/properties/{id}/media', function ($id) {
            $property = PropertyOnSell::findOrFail($id);
            $property->images = is_string($property->images) ? json_decode($property->images, true) : $property->images;
            return view('new-propertyonsellmedia', compact('property'));
        })->name('new-propertyonselldetailmedia');

        Route::get('/Api/Property/all', function () {
            try {
                $response = Http::withOptions([
                    'verify' => false,
                    'timeout' => 30,
                    'connect_timeout' => 10,
                    'retry' => 3,
                    'retry_delay' => 1000,
                ])->get('http://property.tuza-assets.com/api/v1/properties');

                if ($response->successful()) {
                    $properties = $response->json();
                } else {
                    Log::error('Failed to fetch all properties: ' . $response->status() . ' - ' . $response->body());
                    $properties = [];
                }
            } catch (\Exception $e) {
                Log::error('Exception while fetching all properties: ' . $e->getMessage());
                $properties = [];
            }

            return view('api-property-v2.index', compact('properties'));
        })->name('api-property-v2.all');

        Route::get('/propert-on-rent/{id}/media', function ($id) {
            try {
                $response = Http::withOptions([
                    'verify' => false,
                    'timeout' => 30,
                    'connect_timeout' => 10,
                    'retry' => 3,
                    'retry_delay' => 1000,
                ])->get("http://property.tuza-assets.com/api/v1/properties/{$id}");

                if ($response->successful()) {
                    $property = $response->json();
                } else {
                    Log::error('Failed to fetch property media: ' . $response->status() . ' - ' . $response->body());
                    $property = [];
                }
            } catch (\Exception $e) {
                Log::error('Exception while fetching property media: ' . $e->getMessage());
                $property = [];
            }

            return view('api-property-v2.media', compact('property'));
        })->name('propertyonsrentmedia');

        Route::get('api/property/{id}', function ($id) {
            try {
                $response = Http::withOptions([
                    'verify' => false,
                    'timeout' => 30,
                    'connect_timeout' => 10,
                    'retry' => 3,
                    'retry_delay' => 1000,
                ])->get("http://property.tuza-assets.com/api/v1/properties/{$id}");

                if ($response->successful()) {
                    $property = $response->json();

                    // Fetch properties with the same rent
                    $rent = $property['available_units'][0]['rent'] ?? 0;
                    $sameRentResponse = Http::withOptions([
                        'verify' => false,
                        'timeout' => 30,
                        'connect_timeout' => 10,
                        'retry' => 3,
                        'retry_delay' => 1000,
                    ])->get('http://property.tuza-assets.com/api/v1/properties', [
                        'rent' => $rent,
                    ]);

                    if ($sameRentResponse->successful()) {
                        $sameRentProperties = $sameRentResponse->json();
                    } else {
                        Log::error('Failed to fetch same rent properties: ' . $sameRentResponse->status() . ' - ' . $sameRentResponse->body());
                        $sameRentProperties = [];
                    }
                } else {
                    Log::error('Failed to fetch property details: ' . $response->status() . ' - ' . $response->body());
                    $property = [];
                    $sameRentProperties = [];
                }
            } catch (\Exception $e) {
                Log::error('Exception while fetching property details: ' . $e->getMessage());
                $property = [];
                $sameRentProperties = [];
            }

            return view('api-property-v2.show', compact('property', 'sameRentProperties'));
        })->name('api-property-v2.show');

        Route::post('/schedule-visit', [VisitController::class, 'scheduleVisit'])->name('schedule.visit');

        Route::get('/properties', function () {
            $priceMin = request('price_min', 0);
            $priceMax = request('price_max', PHP_INT_MAX);
            $floorAreaMin = request('floor_area_min', 0);
            $floorAreaMax = request('floor_area_max', PHP_INT_MAX);
            $plotAreaMin = request('plot_area_min', 0);
            $plotAreaMax = request('plot_area_max', PHP_INT_MAX);
            $roomsMin = request('rooms_min', 0);
            $roomsMax = request('rooms_max', PHP_INT_MAX);

            $properties = \App\Models\Property::whereHas('available_units', function ($query) use ($priceMin, $priceMax, $roomsMin, $roomsMax) {
                $query->whereBetween('rent', [$priceMin, $priceMax])->whereBetween('bedroom', [$roomsMin, $roomsMax]);
            })
                ->where('floor_area', '>=', $floorAreaMin)
                ->where('floor_area', '<=', $floorAreaMax)
                ->where('plot_area', '>=', $plotAreaMin)
                ->where('plot_area', '<=', $plotAreaMax)
                ->with('available_units', 'thumbnail')
                ->get();

            return response()->json($properties);
        });

        Route::get('/property/on/sell', function () {
            $properties = PropertyOnSell::all();
            return view('propertyonsell', compact('properties'));
        })->name('propertyonsell.all');

        Route::get('/propert/on/sell/{id}', function ($id) {
            $property = PropertyOnSell::findOrFail($id);
            $relatedProperties = PropertyOnSell::where('id', '!=', $id)->inRandomOrder()->take(6)->get();
            return view('propertyonselldetail', compact('property', 'relatedProperties'));
        })->name('propertyonsell.show');

        Route::post('blogs/{blog}/comments', [BlogController::class, 'storeComment'])->name('blogs.comments.store');
        Route::patch('comments/{comment}/status', [BlogController::class, 'updateStatus'])->name('comments.updateStatus');

        Route::get('/Investors', function () {
            try {
                $response = Http::withOptions([
                    'verify' => false, // Disable SSL verification temporarily
                    'timeout' => 30, // Increase timeout
                    'connect_timeout' => 10, // Connection timeout
                    'retry' => 3, // Number of retries
                    'retry_delay' => 1000, // Delay between retries in milliseconds
                ])->get('http://bid.tuza-assets.com/api/v1/plots-on-bid');

                if ($response->successful()) {
                    $plots = $response->json();
                } else {
                    // Log the error and set empty plots array
                    Log::error('Failed to fetch plots: ' . $response->status() . ' - ' . $response->body());
                    $plots = [];
                }
            } catch (\Exception $e) {
                // Log the exception and set empty plots array
                Log::error('Exception while fetching plots: ' . $e->getMessage());
                $plots = [];
            }

            return view('Investors.index', compact('plots'));
        })->name('investors');

        Route::get('/Property_Management', function () {
            return view('PropertyManagement.index');
        })->name('PropertyManagement');

        Route::post('/contact-us', function (Request $request) {
            try {
                Contact::create([
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'tel' => $request->get('tel'),
                    'subject' => $request->get('subject') ?? 'Subject title',
                    'message' => $request->get('message'),
                ]);
                return redirect()->back()->with('success', 'Magazine created successfully.');
            } catch (\Throwable $th) {
                // dd($th);
                return redirect()->back()->with('error', $th->getMessage());
            }
        })->name('contact-us');

        Route::get('design/index', [DesignController::class, 'index'])->name('design.index');
        Route::get('design/create', [DesignController::class, 'create'])->name('designs.create');
        Route::post('design/store', [DesignController::class, 'store'])->name('designs.store');
        Route::get('design/show/{id}', [DesignController::class, 'show'])->name('designs.show');
        Route::get('design/edit/{design}', [DesignController::class, 'edit'])->name('designs.edit');
        Route::put('design/update/{design}', [DesignController::class, 'update'])->name('designs.update'); // Updated to PUT
        Route::delete('design/delete/{design}', [DesignController::class, 'destroy'])->name('designs.destroy');

        Route::get('/plot/{id}', [LeadController::class, 'show'])->name('plot.show');

        Route::get('property', [PropertyController::class, 'index'])->name('property.index');
        Route::get('/properties/{id}', [PropertyController::class, 'show'])->name('property.show');
    },
);

// Payment Routes
Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');
Route::post('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::post('/payment/check-status', [PaymentController::class, 'checkStatus'])->name('payment.check-status');

// Partner Property Routes
