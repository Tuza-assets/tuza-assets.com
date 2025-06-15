<!DOCTYPE html>
<html lang="en">

@include('layouts.partials.head')
<style type="text/css">
    body {
        font-family: 'Roboto', sans-serif;
        padding: 0px;
        margin: 0px;
    }

    .mymodelHelp {
        position: fixed;
        top: 30%;
        left: 0px;
        height: 100vh;
        overflow: auto;
        width: 50%;
        padding: 20px;
    }

    @media (max-width: 768px) {
        .mymodelHelp {
            position: fixed;
            top: 15%;
            left: 0px;
            height: 100vh;
            min-width: 90%;
            padding: 20px;
        }
    }

    .whatsapp-button {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
        background-color: #25D366;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .whatsapp-button i {
        color: white;
        font-size: 30px;
    }

    /* Loader Styles */
    #loader {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .spinner {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 16px solid transparent;
        border-top: 16px solid orange;
        border-right: 16px solid orange;
        border-bottom: 16px solid orange;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }




        a:hover {
            text-decoration: none;
        }


</style>
@stack('styles')
@stack('scripts')

<head>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <meta name="google-site-verification" content="Hx2rzaCJ0q9qnWfgJwh1JKlHF1r6Nb4vrh4a4SJa-no" />

</head>

<body style="font-family: 'Roboto Slab', serif;">
 <x-banner />
    <!-- Loader -->
    <!--<div id="loader">-->
    <!--    <i class="fa fa-spinner fa-pulse fa-3x fa-fw " style="color: orange"></i>-->
    <!--    <span class="sr-only">Loading...</span>-->
    <!--</div>-->

    <header id="main-header" class="">
        @include('layouts.partials.header')
    </header>

    @yield('content')

<!-- WhatsApp Chat Button -->
<a href="https://wa.me/31686495035?text=Hello%20Tuza%20Assets%2C%20I%20would%20like%20to%20know%20more%20about%20your%20bidding%20services." class="whatsapp-button" target="_blank">
    <i class="fab fa-whatsapp"></i>
</a>

    @include('layouts.partials.footer')

    @livewireScripts
    <script>
    //     document.addEventListener('DOMContentLoaded', function() {
    //         const buttons = document.querySelectorAll('.faq-section .card-header button');

    //         buttons.forEach(button => {
    //             button.addEventListener('click', function() {
    //                 const cardBody = this.parentElement.nextElementSibling;
    //                 cardBody.classList.toggle('show');
    //                 this.querySelector('.fa').classList.toggle('fa-plus');
    //                 this.querySelector('.fa').classList.toggle('fa-minus');
    //             });
    //         });
    //     });

    //     window.addEventListener('load', function() {
    //         const loader = document.getElementById('loader');
    //         loader.style.display = 'none';
    //     });
     </script>
</body>
</html>
