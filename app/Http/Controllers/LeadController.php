<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Magazine;
use App\Models\Blog;
use App\Models\PropertyOnSell;

class LeadController extends Controller
{

    public function index()
    {
        try {
            // Get the leads for the past 12 months
            $startOfYear = Carbon::now()->startOfYear()->subYear(); // Adjusted to get full 12 months from last year

            $leads = Lead::where('date', '>=', $startOfYear)
                ->orderBy('date', 'asc')
                ->get()
                ->groupBy(function ($date) {
                    return Carbon::parse($date->date)->format('F'); // Group by month
                });

            // Initialize arrays for each month
            $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            $categories = [];
            $rentalProperties = [];
            $lettingProperties = [];
            $completedProjects = [];
            $plotsOnBid = [];

            foreach ($months as $month) {
                $categories[] = $month;
                $rentalProperties[] = isset($leads[$month]) ? $leads[$month]->sum('rental_properties') : 0;
                $lettingProperties[] = isset($leads[$month]) ? $leads[$month]->sum('letting_properties') : 0;
                $completedProjects[] = isset($leads[$month]) ? $leads[$month]->sum('completed_projects') : 0;
                $plotsOnBid[] = isset($leads[$month]) ? $leads[$month]->sum('plots_on_bid') : 0;
            }

            $data = [
                'categories' => $categories,
                'rental_properties' => $rentalProperties,
                'letting_properties' => $lettingProperties,
                'completed_projects' => $completedProjects,
                'plots_on_bid' => $plotsOnBid,
                'currentMonth' => Carbon::now()->format('F'),
            ];

            // Initialize variables
            $plots = [];
            $properties = [];
            $plots_on_sell = [];

            try {
                // Fetch the plots on bid data from the API
                $response = Http::withOptions([
                    'verify' => false,
                    'timeout' => 30,
                ])->get('https://bid.tuza-assets.com/api/v1/plots-on-bid');
                $plots = $response->json();

                // Fetch the properties data from the API
                $propertyResponse = Http::withOptions([
                    'verify' => false,
                    'timeout' => 30,
                ])->get('https://property.tuza-assets.com/api/v1/properties');
                $properties = $propertyResponse->json();

                // Fetch the plots on sell data from the API
                $response2 = Http::withOptions([
                    'verify' => false,
                    'timeout' => 30,
                ])->get('https://bid.tuza-assets.com/api/v1/plots-on-sell');
                $plots_on_sell = $response2->json();
            } catch (\Throwable $th) {
                // Log the error if needed
                Log::error('Error fetching data: ' . $th->getMessage());
            }

            $blogs = Blog::where('status', 'published')->get();
            $property = PropertyOnSell::all();
            $latestMagazine = Magazine::latest()->first();
            return view('welcome', compact('data', 'plots', 'properties', 'property', 'blogs', 'plots_on_sell', 'latestMagazine'));
        } catch (\Throwable $th) {
        }
    }

    public function editChart($id)
    {
        $Lead = Lead::findOrFail($id);
        return view('admin.chart.edit', compact('Lead'));
    }

    public function show($id)
    {
        $response = Http::get("http://bid.tuza-assets.com/api/v1/plots-on-bid-show/{$id}");
        $plot = $response->json();
        return view('plot.show', ['plot' => $plot]);
    }

    public function index2()
    {
        $startOfYear = Carbon::now()->startOfYear()->subYear();

        $leads = Lead::where('date', '>=', $startOfYear)
            ->orderBy('date', 'asc')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->date)->format('F');
            });

        // Prepare data for the view
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $categories = [];
        $rentalProperties = [];
        $lettingProperties = [];
        $completedProjects = [];
        $plotsOnBid = [];

        foreach ($months as $month) {
            $categories[] = $month;
            $rentalProperties[] = isset($leads[$month]) ? $leads[$month]->sum('rental_properties') : 0;
            $lettingProperties[] = isset($leads[$month]) ? $leads[$month]->sum('letting_properties') : 0;
            $completedProjects[] = isset($leads[$month]) ? $leads[$month]->sum('completed_projects') : 0;
            $plotsOnBid[] = isset($leads[$month]) ? $leads[$month]->sum('plots_on_bid') : 0;
        }

        $data = Lead::where('date', '>=', $startOfYear)->orderBy('date', 'asc')->get(); // Correctly fetch leads

        return view('admin.chart.index', compact('data'));
    }
}
