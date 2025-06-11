@extends('layouts.web')

@section('content')

<style>
    .hero {
        min-height: 70vh;
    }

    .hero h1 {
        font-size: 3em;
    }

    @media (max-width: 424px) {
        .hero h1 {
            font-size: 2em;
        }
    }

    .carousel-view {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 4px 0;
        transition: all 0.25s ease-in;
    }
        .bg-warning{
            background-color: #fe6900 !important;
        }
               .time-text{
            color: #fe6900;
       }
    .carousel-view .item-list {
        width: 100%;
        display: flex;
        gap: 8px;
        scroll-behavior: smooth;
        transition: all 0.25s ease-in;
        -ms-overflow-style: none;
        scrollbar-width: none;
        overflow: auto;
        scroll-snap-type: x mandatory;
    }

    .item-list::-webkit-scrollbar {
        display: none;
    }

    .prev-btn {
        background: #1D940F;
        color: white;
        cursor: pointer;
    }

    .next-btn {
        cursor: pointer;
    }

    .item {
        scroll-snap-align: center;
        min-width: 150px;
        height: 120px;
        background-color: deeppink;
        border-radius: 8px;
    }

    .card img {
        height: 200px; /* Set a fixed height */
        object-fit: cover; /* Crop and fit the image */
    }

    .card {
        cursor: pointer; /* Show pointer cursor on hover */
        transition: transform 0.3s ease; /* Smooth hover effect */
    }

    .card:hover {
        transform: scale(1.05); /* Slightly enlarge the card on hover */
    }

    h4 {
        font-size: 16px;
        font-weight: bold;
    }

    .card-body {
        font-size: 14px;
    }

    .btn-link {
        text-decoration: none;
        color: #ED5303;
        border: none;
        display: flex;
        align-items: center;
        padding: 10px;
        outline: none;
    }

    .btn-link:hover {
        text-decoration: none;
        color: #ED5303;
    }

    .btn-link:focus {
        outline: none;
        box-shadow: none;
    }

    .toggle-icon {
        transition: transform 0.3s ease;
        margin-right: 10px;
        display: inline-block;
    }

    .btn-link.active {
        border: none;
        text-decoration: none;
    }

    .carousel .carousel-inner img {
        height: 300px; /* Set the height you want for carousel images */
        object-fit: cover; /* Ensure image fits within the space while maintaining aspect ratio */
    }

    .carousel .carousel-indicators li {
        background-color: #333; /* Darker color for better visibility */
    }

    .carousel .carousel-control-prev-icon,
    .carousel .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background for better visibility */
        border-radius: 50%;
    }
</style>

    <section class="hero text-white text-center py-5">
        <div class="container">
            <p class="lead">{{ __('home.investors2') }}</p>
        </div>
    </section>
   <section>
    <div class="container pt-5 pb-5">
        <div class="row">
            <!-- Text Content Column -->
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="content">
                            <h4>{{ __('message.real_estate.section1_title') }}</h4>
                            <p>{{ __('message.real_estate.section1_content') }}</p>
                            <h4>{{ __('message.real_estate.section2_title') }}</h4>
                            <p>{{ __('message.real_estate.section2_content') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel Column -->
            <div class="col-md-6">
                @php
                    use App\Models\ProjectProposal;
                    $projectProposals = ProjectProposal::orderBy('created_at', 'desc')->take(10)->get();
                @endphp
                <h4 style="font-size: 16px; font-weight:bold">{{ __('message.section_title') }}</h4>
                <div class="card mt-3">
                    <div id="propertyCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            @foreach ($projectProposals as $index => $proposal)
                                <li data-target="#propertyCarousel" data-slide-to="{{ $index }}"
                                    class="{{ $index == 0 ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($projectProposals as $index => $proposal)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('public/storage/images/' . $proposal->images) }}" class="d-block w-100 h-full"
                                        alt="Project Proposal Image">
                                    <div class="carousel-caption d-none d-md-block">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Carousel controls -->
                        <a class="carousel-control-prev" href="#propertyCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#propertyCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <section>
        <div class="container  pb-5">
            <div class="row">
                <!-- Text Content Column -->
                <div class="col-md-6">
                    <div class="accordion " id="accordionExample">
                        <h4 style="font-size: 16px; font-weight:bold">{{ __('message.why_invest.section1_title') }}</h4>

                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <span class="toggle-icon">►</span> {{ __('message.why_invest.section_title') }}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    {{ __('message.why_invest.section1_content') }}
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        <span class="toggle-icon">►</span> {{ __('message.why_invest.section2_title') }}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>{{ __('message.why_invest.section2_content') }}</p>
                                    <p>{{ __('message.why_invest.section2_sub_content') }}</p>
                                    <ul>
                                        <li>{{ __('message.why_invest.sub_list1') }}
                                            <ul>
                                                <li>{{ __('message.why_invest.sub_list1_sub') }}</li>
                                                <li>{{ __('message.why_invest.sub_list2') }}</li>
                                                <li>{{ __('message.why_invest.sub_list3') }}</li>
                                                <li>{{ __('message.why_invest.sub_list4') }}</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link  text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        <span class="toggle-icon">►</span> {{ __('message.why_invest.section3_title') }}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>{{ __('message.why_invest.section3_content') }}</p>
                                    <ul>
                                        <li>{{ __('message.why_invest.section3_sub_list1') }}</li>
                                        <li>{{ __('message.why_invest.section3_sub_list2') }}</li>
                                        <li>{{ __('message.why_invest.section3_sub_list3') }}</li>
                                        <li>{{ __('message.why_invest.section3_sub_list4') }}</li>
                                        <li>{{ __('message.why_invest.section3_sub_list5') }}</li>
                                        <li>{{ __('message.why_invest.section3_sub_list6') }}</li>
                                        <li>{{ __('message.why_invest.section3_sub_list7') }}</li>
                                        <li>{{ __('message.why_invest.section3_sub_list8') }}</li>
                                        <li>{{ __('message.why_invest.section3_sub_list9') }}</li>
                                        <li>{{ __('message.why_invest.section3_sub_list10') }}</li>
                                        <li>{{ __('message.why_invest.section3_sub_list11') }}</li>
                                        <li>{{ __('message.why_invest.section3_sub_list12') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel Column -->
              <div class="col-md-6 mt-6">
                @php
                    use App\Models\Portfolio;

                    // Fetch all portfolio images
                    $portfolioImages = Portfolio::orderBy('created_at', 'desc')->take(10)->get();
                @endphp
                <h4 style="font-size: 16px; font-weight:bold">{{ __('message.our_portfolio') }}</h4>
                <div class="card mt-3">
                    <div id="portfolioCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            @foreach ($portfolioImages as $index => $portfolio)
                                <li data-target="#portfolioCarousel" data-slide-to="{{ $index }}"
                                    class="{{ $index == 0 ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($portfolioImages as $index => $portfolio)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('public/storage/images/' . $portfolio->image) }}" class="d-block w-100"
                                        alt="Portfolio Image">
                                    <div class="carousel-caption d-none d-md-block">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Carousel controls -->
                        <a class="carousel-control-prev" href="#portfolioCarousel" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#portfolioCarousel" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@if ($plots)
    <section class="plot-on-bid py-5">
        <div class="container">
            <h5 class="text-left text-success mb-5 font-weight-bold">{{ __('message.plot-on-bid') }}</h5>
            <div class="row">
                @foreach ($plots as $plot)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="{{ $plot['featured_photo'] }}" class="card-img-top" alt="Plot" style="height: 200px; object-fit: cover; width: 100%;">
                            <div class="card-body pt-2">
                                <img src="{{ asset('assets/images/locationicon.png') }}" style="height: 12px" 
                                alt="For Diplomats">
                                <h6 class="">    @php
                                    $locationParts = [];
                                    if (isset($plot['province'])) {
                                        $locationParts[] = $plot['province'];
                                    }
                                    if (isset($plot['district'])) {
                                        $locationParts[] = $plot['district'];
                                    }
                                    if (isset($plot['sector'])) {
                                        $locationParts[] = $plot['sector'];
                                    }
                                    $location = implode(', ', $locationParts);
                                @endphp
                                {{ $location }}</h6>
                                <p class="m-0 p-0"><strong>UPI:</strong> {{ $plot['upi'] }}</p>
                                <p class="m-0 p-0"><strong>Starting price:</strong>  {{ Number::currency($plot['max_price'] ?? 0, in:'RWF') }}</p>
                                <p class="m-0 p-0"><strong>Plot size:</strong> {{ number_format($plot['size']) }} m<sup>2</sup></p>
                                <p class="m-0 py-0 text-success"><strong>{{ $plot['bidders'] ?? 0 }} BIDDERS</strong></p>
                                @if(isset($plot['is_bidding']['end_date']))
                                    <div class="py-3" x-data="timer('{{ $plot['is_bidding']['end_date'] }}')" x-init="init()">
                                        <!--<div class="py-2">TIME LEFT</div>-->
                                        <div class="d-flex justify-content-between px-5">
                                            <div class="">
                                                <div class="badge bg-warning text-dark p-3">
                                                    <span x-text="time().totalHours" class="text-white">00</span>
                                            
                                                </div>
                                                  <div class="time-text">Hours</div>
                                            </div>
                                            <div class="">
                                                <div class="badge bg-warning text-dark p-3">
                                                    <span x-text="time().minutes" class="text-white">59</span>
                                                    
                                                </div>
                                                <div class="time-text">Minutes</div>
                                            </div>
                                            <div class="">
                                                <div class="badge bg-warning text-dark p-3">
                                                    <span x-text="time().seconds" class="text-white">28</span>
                                                    
                                                </div>
                                                <div class="time-text">Seconds</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <a href="https://bid.tuza-assets.com/plot/{{ $plot['id'] }}" target="__blank" class="btn btn-success mt-3 w-100">
                                   <div class="d-flex justify-content-between align-items-end">
                                    <div>Bid Now</div>
                                    <div>
                                        <img src="{{ asset('assets/images/buttonicon.png') }}" style="height: 12px" alt="For Diplomats">
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
    
     <hr>
        <div class="container py-4">
            <div class="row">
                
                <div class="col-md-6">
                    <a href="{{ route('BuyPlot') }}" class="btn btn-success d-flex  align-items-center justify-content-center gap-2">
                        <span class="px-3"> {{ __('message.See_plot-on-bid') }}</span>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('propertyonsell.all') }}" class="btn btn-success d-flex  align-items-center justify-content-center gap-2">
                        <span class="px-3"> {{ __('message.See_plot-on-sell') }}</span>
                    </a>
                </div>
            </div>
        </div>
    <style>
            hr {
        border: 1px solid #fe6900;
        width: 80%;
       }  
        h4{
            font-size: 16px;
            font-weight:bold
        }
        .card-body{
            font-size: 14px;
        }
        .card .btn{
            font-size: 14px;
        }
        .btn-link {
            text-decoration: none;
            color: #ED5303;
            border: none;
            display: flex;
            align-items: center;
            padding: 10px;
            outline: none;
        }

        .btn-link:hover {
            text-decoration: none;
            color: #ED5303;
        }

        .btn-link:focus {
            outline: none;
            box-shadow: none;
        }

        .toggle-icon {
            transition: transform 0.3s ease;
            margin-right: 10px;
            display: inline-block;
        }

        .card-header h5 {
            cursor: pointer;
        }

        .btn-link.active {
            border: none;
            text-decoration: none;
        }
    </style>

    <!-- Include JavaScript directly in the Blade template -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var accordionButtons = document.querySelectorAll('.btn-link');

            accordionButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var isActive = button.classList.contains('active');
                    var icons = document.querySelectorAll('.toggle-icon');
                    icons.forEach(function(icon) {
                        icon.textContent = '►';
                    });

                    if (!isActive) {
                        button.querySelector('.toggle-icon').textContent = '▼';
                        accordionButtons.forEach(function(btn) {
                            btn.classList.remove('active');
                        });
                        button.classList.add('active');
                    } else {
                        button.querySelector('.toggle-icon').textContent = '►';
                        button.classList.remove('active');
                    }
                });
            });
        });
    </script>
    
    <script>
    function timer(endDate) {
        return {
            endDate: new Date(endDate),
            remaining: null,
            init() {
                this.setRemaining();
                setInterval(() => {
                    this.setRemaining();
                }, 1000);
            },
            setRemaining() {
                const diff = this.endDate - new Date();
                this.remaining = parseInt(diff / 1000);
            },
            totalHours() {
                return Math.floor(this.remaining / (60 * 60));
            },
            minutes() {
                return Math.floor((this.remaining % (60 * 60)) / 60);
            },
            seconds() {
                return this.remaining % 60;
            },
            format(value) {
                return ("0" + parseInt(value)).slice(-2);
            },
            time() {
                return {
                    totalHours: this.format(this.totalHours()),
                    minutes: this.format(this.minutes()),
                    seconds: this.format(this.seconds()),
                }
            },
        }
    }
</script>
@endsection


     <!--@if ($plots)-->
     <!--   <section class="plot-on-bid py-5">-->
     <!--       <div class="container">-->
                <!--@include('layouts.slider.app')-->
     <!--           <h5 class="text-left  text-success mb-5 font-weight-bold "> {{ __('message.plot-on-bid') }}</h5>-->
     <!--           <div class="container">-->
     <!--               <div class="carousel-view">-->
     <!--                   <button id="prev-btn" class="prev-btn">-->
     <!--                       <svg viewBox="0 0 512 512" width="20" title="chevron-circle-left">-->
     <!--                           <path-->
     <!--                               d="M256 504C119 504 8 393 8 256S119 8 256 8s248 111 248 248-111 248-248 248zM142.1 273l135.5 135.5c9.4 9.4 24.6 9.4 33.9 0l17-17c9.4-9.4 9.4-24.6 0-33.9L226.9 256l101.6-101.6c9.4-9.4 9.4-24.6 0-33.9l-17-17c-9.4-9.4-24.6-9.4-33.9 0L142.1 239c-9.4 9.4-9.4 24.6 0 34z" />-->
     <!--                       </svg>-->
     <!--                   </button>-->
     <!--                   <div id="item-list" class="item-list">-->
     <!--                       @if ($plots)-->
     <!--                           @forelse ($plots as $plot)-->
     <!--                               <div class="col-md-3">-->
     <!--                                   <div class="card custom-card">-->
     <!--                                       <img src="{{ $plot['featured_photo'] }}" class="card-img-top"-->
     <!--                                           alt="Plot 1">-->
     <!--                                       <div class="card-body">-->
     <!--                                           <div class="card-title">-->
     <!--                                               <p><img src="{{ asset('assets/images/22.svg') }}" alt="icon">-->
     <!--                                                   {{ $plot['province'] ?? 'N/A' }},-->
     <!--                                                   {{ $plot['district'] ?? 'N/A' }},-->
     <!--                                                   {{ $plot['sector'] ?? 'N/A' }}-->
     <!--                                               </p>-->
     <!--                                               <p><strong>UPI: {{ $plot['upi'] }}</strong></p>-->
     <!--                                           </div>-->
     <!--                                           <div class="card-details">-->
     <!--                                               <p><strong>Plot size:</strong> {{ number_format($plot['size']) }}-->
     <!--                                                   {{ $plot['measure'] }}</p>-->
     <!--                                               <p><strong>Min Cost:</strong> {{ number_format($plot['min_price']) }}-->
     <!--                                                   {{ $plot['currency'] }}</p>-->
     <!--                                               <p><strong>Max Cost:</strong> {{ number_format($plot['max_price']) }}-->
     <!--                                                   {{ $plot['currency'] }}</p>-->
     <!--                                               <p><strong>Status:</strong> {{ ucfirst($plot['status']) }}</p>-->
     <!--                                               <p><strong>Created at:</strong>-->
     <!--                                                   {{ \Carbon\Carbon::parse($plot['created_at'])->format('F d, Y') }}-->
     <!--                                               </p>-->
     <!--                                           </div>-->
     <!--                                           <div class="text-center">-->
     <!--                                               <a href="https://bid.tuza-assets.com/plot/{{ $plot['id'] }}"-->
     <!--                                                   target="__blank" class="btn btn-link" style="color: #000000">View-->
     <!--                                                   More</a>-->
     <!--                                           </div>-->
     <!--                                       </div>-->
     <!--                                   </div>-->

     <!--                               </div>-->
     <!--                           @empty-->
     <!--                           @endforelse-->
     <!--                       @endif-->
     <!--                   </div>-->
     <!--                   <button id="next-btn" class="next-btn" ts>-->
     <!--                       <svg viewBox="0 0 512 512" width="20" title="chevron-circle-right">-->
     <!--                           <path-->
     <!--                               d="M256 8c137 0 248 111 248 248S393 504 256 504 8 393 8 256 119 8 256 8zm113.9 231L234.4 103.5c-9.4-9.4-24.6-9.4-33.9 0l-17 17c-9.4 9.4-9.4 24.6 0 33.9L285.1 256 183.5 357.6c-9.4 9.4-9.4 24.6 0 33.9l17 17c9.4 9.4 24.6 9.4 33.9 0L369.9 273c9.4-9.4 9.4-24.6 0-34z" />-->
     <!--                       </svg>-->
     <!--                   </button>-->
     <!--               </div>-->
     <!--           </div>-->



     <!--       </div>-->
     <!--   </section>-->
    @endif
