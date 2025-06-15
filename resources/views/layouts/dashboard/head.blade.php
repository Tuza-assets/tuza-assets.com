<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="icon" href="{{ asset('assets/images/fiveicon.jpg') }}" type="image/png">
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>admin</title>
    <!--This page css - Morris CSS -->
    <link href="{{asset('build/assets/app-CtpER2l3.css')}}" rel="stylesheet" />
    <script src="{{asset('build/assets/app-C1-XIpUa.js')}}"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/styles.css">
     <style>
        .btn-primary {
            background-color: orangered !important;
            border-color: orangered;
        }
        .btn-primary:hover {
            background-color: orangered;
            border-color: orangered;
        }
        .btn-success {
            background-color: green !important;
            border-color: green;
        }
        .btn-success:hover {
            background-color: green;
            border-color: green;
        }
     </style>
</head>
