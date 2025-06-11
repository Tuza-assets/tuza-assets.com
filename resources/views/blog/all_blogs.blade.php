@extends('layouts.web')

@section('content')
<style>
    .feature-list i {
        color: green;
        margin-right: 10px;
    }
    
     .hero {
            min-height: 70vh;
        }

        .hero h1 {
            font-size: 3em;


        } 
 
        @media (max-width: 424px) {
            .hero {
            min-height: 70vh;
        }

            .hero h1 {
                font-size: 1.7em;
            }
        }

</style>
    <section class="hero text-white text-center py-5">
        <div class="container">
             <h1 class="display-4">TUZA ASSETS Ltd</h1>
            <p class=" ">{{__('message.Blog')}}</p>
        </div>
    </section>
   
   
      @if ($blogs)
        <section class="  py-5">
            <div class="container"> 
                <div class="row">
                    @if ($blogs)
                        @foreach ($blogs as $blog) 
                                    <div class="col-md-4 mb-4">
                                        <a href="{{ route('blogdetail', $blog->slug) }}" class="text-decoration-none">
                                            <div class="card h-100 text-white overflow-hidden">
                                                <div class="card-img-top zoom-image" style="background: url('{{ isset($blog->images) ? asset('public/storage/' . $blog->images) : asset('assets/images/default-image.jpg') }}') center/cover no-repeat; height: 280px;"></div>
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between text-muted mb-2">
                                                        <div >
                                                            <i class="fas fa-user"></i><span style="font-size:12px">TUZA ASSETS Ltd</span>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-calendar "></i><span style="font-size:12px"> {{ $blog->created_at ? \Carbon\Carbon::parse($blog->created_at)->format('m-d-Y') : 'N/A' }}</span>
                                                        </div>
                                                    </div>
                                                    <h5 class="card-title text-dark">{{ $blog->title }}</h5>
                                                    <p class="card-text text-muted" style="font-size:10px">{{ Str::limit($blog->description, 100) }}</p>
                                                    <a href="{{ route('blogdetail', $blog->slug) }}" class="btn btn-link p-0 text-success">Details →</a>
                                                </div>
                                            </div>
                                        </a>
                                    </div> 
                        @endforeach
                    @else
                        <p>No blogs available.</p>
                    @endif
                </div> 
                   
            </section>
    @endif
@endsection
