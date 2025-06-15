@extends('layouts.web')
<style>
    .faq-section .card-body {
        display: none;
        transition: max-height 0.3s ease;
    }

    .faq-section .card-body.show {
        display: block;
    }

    .card-border {
        border-right: 1px solid #1D940F;
    }
 
 .card-border {
     color:black;
 }
 
 
.text-success {
    color: #1D940F;
}
 @media (max-width: 424px) {
            .header{
                margin-top:40px;
            }
            .lead {
                display: none;
            }

            .hero h1 {
                font-size: 2em;
            }
        }

    .btn-success {
        background: #1D940F;
    }

    .text-success {
        color: #1D940F;
    }
</style>
@section('content')
    <section class="hero text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">TUZA ASSETS Ltd</h1>
            <p class="lead">{{ __('Zones') }}</p>
        </div>
    </section>
 
  <section class="faq-section my-4">
        <div class="container">
            <h2 class="text-center mb-2 font-weight-bold text-success">{{ __('Zones Regulations') }}s</h2>

            <div class="row">
                <div class="col-12 col-lg-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn w-100 text-start" data-bs-toggle="collapse" data-bs-target="#faq1">
                                {{ __('R1: Low Density Residential Zone') }}<i class="fa fa-plus float-end"></i>
                            </button>
                        </div>
                        <div id="faq1" class="collapse card-body">
                            
                            <ul>
                                <li>Intended for:
                                    <ul>
                                        <li>Villa</li>
                                        <li>Bungalow</li>
                                    </ul>
                                </li>
                                 <li>Permitted Uses:
                                    <ul>
                                        <li>Single family houses</li>
                                        <li>Home Occupation</li>
                                    </ul>
                                </li>
                                <li>Ancillary Uses:
                                    <ul>
                                        <li>Car parking garage</li>
                                        <li>Store and Service rooms</li>
                                        <li>Guard House</li>
                                    </ul>
                                </li>
                                <li>
                                    plot Size: Max 500 m<sup>2</sup>
                                </li>
                                <li>
                                   Maximum Building Coverage: 40%
                                </li>
                                <li>
                                    Minimum landscape Coverage: 20%
                                </li>
                                <li>
                                    <span class="font-weight-bold">Maximum Number of floors </span>
                                    <ul>
                                        <li>G+1+P (Penthouse)</li>
                                        <li> (ancillary buildings)</li>
                                    </ul>
                                </li>
                            </ul>
                            
                            <ul>
                                <li > <span class="font-weight-bold">Not allowed for:</span> 
                                    <ul>
                                        <li>- Industrial uses </li>
                                        <li>- Major infrastructure </li>
                                        <li>- Gated estates on developments of more than 1 ha </li>
                                    </ul> 
                                </li>
                            </ul>
                             <ul>
                                <li><span class="font-weight-bold">Minimum residential density:</span> 
                                    <ol>
                                        <li>Single Use: 10-15 Du/Ha </li>
                                        <li>Mixed Use: 7-10 Du/Ha (considering when building is partially occupied by other uses as per O-C2 overlay regulations ) </li>
                                        <li>- Gated estates on developments of more than 1 ha </li>
                                    </ol> 
                                </li>
                            </ul>
                            
                            <ul>
                                <li> <span class="font-weight-bold">Roads Planning: </span>
                                    <ol>
                                        <li>Physical plan :
                                            <ul>
                                                <li>Implemented on the site (only the map)   </li>
                                                 <li>Not yet implemented in the site ( need to leave the space for the road) </li>
                                            </ul>
                                        </li>
                                        <li>Existing road Available</li> 
                                    </ol> 
                                </li>
                            </ul>
                            
                            
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn w-100 text-start" data-bs-toggle="collapse" data-bs-target="#faq2">
                                {{ __('R1A : Low Density Residential Densification Zone') }} <i class="fa fa-plus float-end"></i>
                            </button>
                        </div>
                        <div id="faq2" class="collapse card-body">
                            <ul>
                                <li>Intended for:
                                    <ul>
                                        <li>Single family houses (all types)</li>
                                        <li>Semi-detached houses</li>
                                        <li>Multifamily Houses</li>
                                        <li>Townhouses</li>
                                        <li>Row houses</li>
                                        <li>Home Occupation</li> 
                                    </ul>
                                </li> 
                                <li>Ancillary Uses:
                                    <ul>
                                        <li>Car parking garage</li>
                                        <li>Store and Service rooms</li>
                                        <li>Guard House</li>
                                    </ul>
                                </li>
                                <li>
                                    plot Size: Max 300 m<sup>2</sup>
                                </li>
                                <li>
                                   Maximum Building Coverage: 50%
                                </li>
                                <li>
                                    Minimum landscape Coverage: 20%
                                </li>
                                <li>
                                    <span class="font-weight-bold">Maximum Number of floors </span>
                                    <ul>
                                        <li>: G+2, G (ancillary buildings)</li> 
                                    </ul>
                                </li>
                            </ul> 
                            <ul>
                                <li > <span class="font-weight-bold">Not  for:</span> 
                                    <ul>
                                        <li>Residential not exceeding G + 2 (2 levels above the ground floor) </li>
                                        <li>Industrial uses and Major infrastructure </li> 
                                    </ul> 
                                </li>
                            </ul>
                            <ul>
                                <li><span class="font-weight-bold">Minimum residential density:</span> 
                                    <ol>
                                        <li>Single Use: 20-30 Du/Ha </li>
                                        <li>Mixed Use: 15-20 Du/Ha (considering when building is partially occupied by other uses as per O-C2 overlay regulations )</li>
 
                                    </ol> 
                                </li>
                            </ul> 
                            <ul>
                                <li> <span class="font-weight-bold">Roads Planning: </span>
                                    <ol>
                                        <li>Physical plan :
                                            <ul>
                                                <li>Implemented on the site (only the map)   </li>
                                                 <li>Not yet implemented in the site ( need to leave the space for the road) </li>
                                            </ul>
                                        </li>
                                        <li>Existing road Available</li> 
                                    </ol> 
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
                
                
                <div class="col-12 col-lg-6 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn w-100 text-start" data-bs-toggle="collapse" data-bs-target="#faq3">
                                {{ __('R1B: Rural Residential Zone') }} <i class="fa fa-plus float-end"></i>
                            </button>
                        </div>
                        <div id="faq3" class="collapse card-body">
                              <ul>
                                <li>Intended for:
                                    <ul>
                                        <li>Single family houses </li>
                                        <li>Row housing</li>
                                        <li>Multifamily residential (4 in 1, 8 in 1, etc)</li>
                                        <li>Low-rise apartments</li>
                                        <li>Home Occupation</li>
                                        <li>Accessory Residential Units</li>
                                        <li>Detached Bungalows</li>
                                        <li>Semi Detached Houses</li>
                                        <li>Rowhouses</li> 
                                    </ul>
                                </li> 
                                <li>Ancillary Uses:
                                    <ul>
                                        <li>Car parking garage</li>
                                        <li>Outdoor kitchen</li>
                                        <li>Store rooms</li>
                                    </ul>
                                </li>
                                <li>
                                    plot Size: Max 100 m<sup>2</sup> for Row Housing or Single-Family Units / Multifamily houses or Apartment development including additional rooms for rental shall be allowed
                                </li>
                                <li>
                                   Maximum Building Coverage: 60%
                                </li>
                                <li>
                                    Minimum landscape Coverage: N/A
                                </li>
                                <li>
                                    <span class="font-weight-bold">Maximum Number of floors </span>
                                    <ul>
                                        <li>	G + 1 for single family houses (Ground floor + one level)</li> 
                                        <li>G+2 for all other typologies</li>
                                        <li>G (ancillary buildings)</li>
                                    </ul>
                                </li>
                            </ul> 
                            <ul>
                                <li > <span class="font-weight-bold">Not  for:</span> 
                                    <ul>
                                        <li>Industrial uses & Major infrastructure </li> 
                                    </ul> 
                                </li>
                            </ul>
                            <ul>
                                <li><span class="font-weight-bold">Minimum residential density:</span> 
                                    <ol>
                                        <li>Single Use: 40-70  Du/Ha </li>
                                        <li>Mixed Use:  30-50 Du/Ha (considering when building is partially occupied by other uses as per O-C2 overlay regulations )</li>
 
                                    </ol> 
                                </li>
                            </ul> 
                            <ul>
                                <li> <span class="font-weight-bold">Roads Planning: </span>
                                    <ol>
                                        <li>Physical plan :
                                            <ul>
                                                <li>Implemented on the site (only the map)   </li>
                                                 <li>Not yet implemented in the site ( need to leave the space for the road) </li>
                                            </ul>
                                        </li>
                                        <li>Existing road Available</li> 
                                    </ol> 
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                
                
                <div class="col-12 col-lg-6 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn w-100 text-start" data-bs-toggle="collapse" data-bs-target="#faq4">
                                {{ __('message.faq-section.faq4.title') }}<i class="fa fa-plus float-end"></i>
                            </button>
                        </div>
                        <div id="faq4" class="collapse card-body">{{ __('message.faq-section.faq4.description') }}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn w-100 text-start" data-bs-toggle="collapse" data-bs-target="#faq5">
                                {{ __('message.faq-section.faq5.title') }} <i class="fa fa-plus float-end"></i>
                            </button>
                        </div>
                        <div id="faq5" class="collapse card-body">
                            {{ __('message.faq-section.faq5.description') }}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn w-100 text-start" data-bs-toggle="collapse" data-bs-target="#faq5">
                                {{ __('message.faq-section.faq6.title') }} <i class="fa fa-plus float-end"></i>
                            </button>
                        </div>
                        <div id="faq5" class="collapse card-body">{{ __('message.faq-section.faq6.description') }}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn w-100 text-start" data-bs-toggle="collapse" data-bs-target="#faq5">
                                {{ __('message.faq-section.faq7.title') }}<i class="fa fa-plus float-end"></i>
                            </button>
                        </div>
                        <div id="faq5" class="collapse card-body">{{ __('message.faq-section.faq7.description') }}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn w-100 text-start" data-bs-toggle="collapse" data-bs-target="#faq5">
                                {{ __('message.faq-section.faq8.title') }} <i class="fa fa-plus float-end"></i>
                            </button>
                        </div>
                        <div id="faq5" class="collapse card-body">{{ __('message.faq-section.faq8.description') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
@endsection
