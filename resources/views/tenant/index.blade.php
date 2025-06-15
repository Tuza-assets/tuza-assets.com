@extends('layouts.web')
<style>
    .feature-list i {
        color: green;
        margin-right: 10px;
    }
</style>
@section('content')
    <section class="hero text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">{{__('message.tenants_title')}}</h1>
        </div>
    </section>
    <div class="bg-white container-fluid " style="padding: 100px 30px">
        <div class="container">
            <!-- Top Section with Image and Overview -->
            <div class="row ">
                <div class="col-md-12 row ">
                    <div class="col-md-6">
                        <img src="{{ asset('/assets/images/invetor1.jpg') }}" style="width: 500px;border-radius: 10px"
                            class="img-fluid" alt="Living Room">
                    </div>
                    <div class="p-4 col-md-6">
                        <div class="">{{__('message.tenants_message')}}
                        </div>
                        <div class="my-3">
                        <a class="btn  btn-success " href="{{ route('Contact') }}" style="background: green;padding:10px 20px;margin-top:30px;color:white;" href="">{{__('message.tenants_oinus')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
