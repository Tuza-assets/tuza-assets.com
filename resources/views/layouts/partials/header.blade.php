<style>
    .navbar{
        padding:10px 30px;
    }
    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link:focus {
        color: #4caf50;
        /* Green color for hover */
    }

    .navbar-nav .nav-item .nav-link {
        text-transform: uppercase;
        font-size: .7em;
        
    }

    .dropdown-menu {
        border: none;
        border-radius: 0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 0;
        /* Align dropdown with the menu item */
    }

    .dropdown-item {
        color: #666;
        padding: 10px 20px;
        /* Adjust padding */
        font-size: 14px;
        /* Adjust font size */
    }

    .dropdown-item:hover,
    .dropdown-item:focus {
        color: #fff;
        background-color: #4caf50;
        /* Green background on hover */
    }

    .navbar-nav .nav-item.active .nav-link {
        color: #4caf50;
        /* Active state color */

    }

    .navbar-brand {
        color: #4caf50;
        font-weight: bold;
    }

    .navbar-brand:hover {
        color: #e84c0b;
    }
    .navbar-brand img {
        max-width: 200px;
    }
    .dropdown-divider {
        height: 1px;
        margin: 0.5rem 0;
        overflow: hidden;
        background-color: #e9ecef;
    }

    @media (max-width: 970px) {
        .navbar {
            background: white;
        }
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand" href="{{ route('welcome') }}">
        <img src="{{ asset('assets/images/Logo-nobg.png') }}" alt="Logo"  >
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('welcome') }}">{{ __('message.home') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">{{ __('message.about_us') }}</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownServices" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('message.services') }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownServices">
                    <a class="dropdown-item" href="{{ route('diaspora') }}">{{ __('message.for_diaspora') }}</a>
                    <a class="dropdown-item" href="{{ route('diplomats') }}">{{ __('message.for_diplomats') }}</a>
                    <a class="dropdown-item" href="{{ route('all_property') }}">{{ __('message.for_tenants') }}</a>
                    <!--<a class="dropdown-item" href="{{ route('tenant.view') }}">{{ __('message.for_tenants') }}</a>-->
                    <a class="dropdown-item" href="https://loancalculator.tuza-assets.com/en">{{ __('message.bank_loan_calculator') }}</a>
                    <a class="dropdown-item" href="{{ route('insurance&secturity.view') }}">{{ __('message.insurance_security') }}</a>
                    <a class="dropdown-item" href="{{ route('legal-issues-facilitation') }}">{{ __('message.legal_issues_facilitation') }}</a>
                    <a class="dropdown-item" href="{{ route('bank-loan-application') }}">{{ __('message.bank_loan_application') }}</a>
                    <a class="dropdown-item" href="{{ route('BuyPlot') }}">{{ __('message.buy_plot') }}</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                    href="{{ route('PropertyManagement') }}">{{ __('message.property_management') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('investors') }}">{{ __('message.investors') }}</a>
            </li>
            <!--<li class="nav-item">-->
            <!--    <a class="nav-link" href="{{ route('blogs') }}">{{ __('message.designs') }}</a>-->
            <!--</li>-->
            <!--<li class="nav-item">-->
            <!--    <a class="nav-link" href="{{ route('all_blogs') }}">Blogs</a>-->
            <!--</li>-->
            
            <li class="nav-item">
                <!--<a class="nav-link" href="{{ route('propertyonsell.all') }}">{{__('message.house_for_sell')}}</a>-->
                <a class="nav-link" href="{{ route('new-propertyonsell') }}">{{__('message.house_for_sell')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('BuyPlot') }}">{{ __('message.buy_plot') }}</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownServices" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{__('home.Login')}} / {{__('home.Register')}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownServices">
                    <a class="dropdown-item" href="https://property.tuza-assets.com/register" target="_blank">{{__('home.Tenant')}}</a>
                    <a class="dropdown-item" href="https://property.tuza-assets.com/register" target="_blank">{{__('home.Landlord')}} </a>
                    <a class="dropdown-item" href="https://bid.afrinnovators.co.rw/register" target="_blank">{{__('home.Bidding')}}</a>
                </div>
            </li>
            <li class="nav-item">
                  <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL('en') }}"><span
                            class="fi fi-gb"></span> English</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL('fr') }}"><span
                            class="fi fi-fr"></span> FRANCAIS</a>
            </li>
        </ul>
    </div>
</nav>
