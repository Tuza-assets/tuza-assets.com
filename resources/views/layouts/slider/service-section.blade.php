
<div class="container  service-section">
    <div class="row">
        <div class="col-md-4 main">
            <div class="service-item">
                <i><img src="{{ asset('assets/images/ploticon.png') }}" style="width:100px; height:100px;" alt="Icon 1"></i>
                <h4>{{ __('message.plots_houses_title') }}</h4>
                <ul class="service-links">
                    <li>
                        <a href="{{ route('BuyPlot') }}"><i class="fa fa-angle-right" aria-hidden="true"></i>
                            {{ __('message.property_bidding') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('all_property') }}"><i class="fa fa-angle-right"
                                aria-hidden="true"></i> {{ __('message.houses_for_rent') }}
                        </a>
                    </li>

                    <li>
                        <!--<a href="{{ route('propertyonsell.all') }}"><i class="fa fa-angle-right" aria-hidden="true"-->
                        <!--        style="font-size: 1.5rem;"></i>-->
                        <!--    {{ __('message.houses_for_sale') }}-->
                        <!--</a>-->
                        <a href="{{ route('new-propertyonsell') }}"><i class="fa fa-angle-right" aria-hidden="true"
                                style="font-size: 1.5rem;"></i>
                            {{ __('message.houses_for_sale') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('all_property') }}"><i class="fa fa-angle-right" aria-hidden="true"></i>
                            {{ __('message.property_listings') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blogs') }}"><i class="fa fa-angle-right" aria-hidden="true"></i>
                           {{ __('footer.design_construction') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-4 main">
            <div class="service-item">
                <i > <img src="{{ asset('assets/images/secity.png') }}" style="width:100px; height:100px;" alt="Icon 1"></i>
                 <h4>{{ __('message.fund_security_title') }}</h4>
                <ul class="service-links">
<li>
                        <a href="{{ route('bank-loan-application') }}"><i class="fa fa-angle-right"
                                aria-hidden="true"></i> {{ __('message.bank_loan_application') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('insurance&secturity.view') }}"><i class="fa fa-angle-right"
                                aria-hidden="true"></i>
                            {{ __('message.property_insurance_security') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('rental-collection') }}">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            {{ __('message.rental_collection') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('property-inspection') }}">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            {{ __('message.property_inspection') }}
                        </a>
                    </li>
                    <li>
                        <a href="https://loancalculator.tuza-assets.com/en?_gl=1*epf3kw*_ga*NzU2NjM1ODQ5LjE2OTg4NTg5MTI.*_ga_BZJJ40XPD8*MTcxMzI4NTcyMi42NC4xLjE3MTMyODU3NDMuMC4wLjA">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            {{ __('message.finance_your_project') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-4 main">
            <div class="service-item">
                <i>  <img src="{{ asset('assets/images/estate.png') }}" style="width:100px; height:100px;" alt="Icon 1"></i>
                <h4>{{ __('message.real_estate_title') }}</h4>
                <ul class="service-links">
                    <li>
                        <a href="{{ route('Zoning2') }}">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            {{ __('message.construction_zones') }}
                        </a>

                    </li>
                    <li>
                        <a class="" href="{{ route('PropertyManagement') }}">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            {{ __('message.property_management') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('investors') }}">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            {{ __('message.investors_corner') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blogs') }}">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            {{ __('message.get_inspirations') }}
                        </a>
                    </li>
                    <li>
                        <a href="https://property.tuza-assets.com/register">
                            <i class="fa fa-angle-right"
                                aria-hidden="true"></i>{{ __('message.tenants_relationships') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<style>
.service-section {
    background: url('{{ asset('assets/images/Frame.png') }}') no-repeat center center;
    background-size: cover;

    color: #fff;

}

.main {

    padding-top: 8vh;
}
.main .service-item i{
     text-align: center;
}
.main:hover {
    background-color: rgba(29,148,15, 0.3);
}

.service-item {
    background-color: transparent;
    padding: 30px;
    color: #fff;
    transition: background-color 0.3s, height 0.3s, transform 0.3s;
    height: 50vh;
    display: flex;
    flex-direction: column;
    position: relative;
    overflow: hidden;
}

.service-item h4 {
    font-size: 1.5rem;
    font-weight: bold;
    margin-top: 15px;
}

.service-item i {

    margin-bottom: 5px;
    transition: transform 0.3s;
}

.service-links {
    display: none;
    list-style-type: none;
    padding: 0;
    margin-top: 20px;
    text-align: left;
}

.service-links li {
    transition: transform 0.2s ease;
    transform: translateX(0);
}

.service-links li a {
    color: #fff;
    text-decoration: none;
    font-size: 1rem;
    transition: transform 0.3s, color 0.3s;
}

.service-item:hover {
    background-color: transparent;
    height: auto;
}

.service-item:hover .service-links {
    display: block;
}

.service-item:hover i {
    transform: scale(0.8);
}

.service-links li:hover {
    transform: translateX(5px);
}

.service-links li a:hover {
    color: #e84c0b;
    
}
</style>
