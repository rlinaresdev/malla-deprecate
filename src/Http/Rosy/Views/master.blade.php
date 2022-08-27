<!DOCTYPE html>
<html lang="{{$language}}" dir="ltr">
   <head>
      <meta charset="{{$charset}}">
   	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   	  <meta name="viewport" content="width=device-width, initial-scale=1">
   	  <link href="{{config("app.logo")}}" rel='shortcut icon' type='image/png'/>

      @section("metadata")

   	 <!-- CSRF Token -->
   	 <meta name="csrf-token" content="{{ csrf_token() }}">

		@show

      <title>{{$title}}</title>

      @section("css")

     <link href="{{__url('__rosy/css/bootstrap.min.css')}}" rel="stylesheet">
     <link href="{{__url('__rosy/css/materialdesignicons.min.css')}}" rel="stylesheet">
     <link href="{{__url('__rosy/css/layout-ui.css')}}" rel="stylesheet">
     @show

   </head>
   <body>
      @yield("body", 'Content Page')
		@section("js")

		<script src="{{__url('__rosy/js/jquery-360.min.js')}}"></script>
		<script src="{{__url('__rosy/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{__url('__rosy/js/layout-ui.js')}}"></script>
		@show

   </body>
</html>
