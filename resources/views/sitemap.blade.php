@extends('layouts.web')
@section('content')
    <style>
        .sitemap {
            text-align: center;
            margin-top: 50px;
        }
        .sitemap .node {
            display: inline-block;
            margin: 20px;
            padding: 10px 20px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        .sitemap .node a {
            text-decoration: none;
            color: #e67e22;
            transition: color 0.3s ease;
        }
        .sitemap .node:hover {
            border-color: #000;
            color: #000;
        }
        .sitemap .node:hover a {
            color: #000;
        }
        .sitemap .line {
            height: 20px;
            border-left: 2px solid #ddd;
            margin: 0 auto;
        }
    </style>

    <section class="hero text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">TUZA ASSETS Ltd</h1>
            <p class="lead">Site Map</p>
        </div>
    </section>
<section>
    <div class="container sitemap py-5">
    <h5 class="mb-4">STIEMAP</h5>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="node"><a href="#">Home page</a></div>
        </div>
        <div class="w-100 "></div>
        <div class="col-md-3">
            <div class="node"><a href="#">About - TUZA Assets</a></div>
        </div>
        <div class="col-md-3">
            <div class="node"><a href="#">Diaspora - TUZA Assets</a></div>
        </div>
        <div class="col-md-3">
            <div class="node"><a href="#">Tenants - TUZA Assets</a></div>
        </div>
        <div class="col-md-3">
            <div class="node"><a href="#">Diplomats - TUZA Assets</a></div>
        </div>
        <div class="w-100"></div>
        <div class="col-md-3">
            <div class="node"><a href="#">INVESTORS SPACE - TUZA Assets</a></div>
        </div>
        <div class="col-md-3">
            <div class="node"><a href="#">Contact - TUZA Assets</a></div>
        </div>
        <div class="col-md-3">
            <div class="node"><a href="#">Best kept secret - TUZA Assets</a></div>
        </div>
        <div class="col-md-3">
            <div class="node"><a href="#">Privacy Policy - TUZA Assets</a></div>
        </div>
        <div class="w-100"></div>
        <div class="col-md-3">
            <div class="node"><a href="#">FAQ - TUZA Assets</a></div>
        </div>
        <div class="col-md-3">
            <div class="node"><a href="#">Disclaimer - TUZA Assets</a></div>
        </div>
        <div class="col-md-3">
            <div class="node"><a href="#">Terms and conditions - TUZA Assets</a></div>
        </div>
        <div class="col-md-3">
            <div class="node"><a href="#">Submit a Property - TUZA Assets</a></div>
        </div>
        <div class="w-100"></div>
        <div class="col-md-3">
            <div class="node"><a href="#">Home 6 - TUZA Assets</a></div>
        </div>
        <div class="col-md-3">
            <div class="node"><a href="#">Our Expertise - TUZA Assets</a></div>
        </div>
        <div class="col-md-3">
            <div class="node"><a href="#">Tenant - TUZA Assets</a></div>
        </div>
        <div class="col-md-3">
            <div class="node"><a href="#">What we do? - TUZA Assets</a></div>
        </div>
    </div>
</div>

</section>
@endsection
