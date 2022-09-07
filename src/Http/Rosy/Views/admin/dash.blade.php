@extends("rosy::master")

   @section("css")
      @parent <link href="{{__url('__rosy/css/admin-ui.css')}}" rel="stylesheet">
   @endsection

   @section("body")

      <main role="rosy" class="admin">

         <nav class="rosy-nav">
            <div class="nv-0">
               {!! Nav::tag("leftnav", 12) !!}
            </div>
            <div class="nv-1">

               <h4 class="title">
                  <img src="{{__url($login->avatar)}}" alt="@" class="avatar avatar-circle">
                  {{$login->shortname}}

                  <span class="tool"><i class="mdi mdi-dots-vertical"></i></span>
               </h4>

               {!! Nav::tag("rightnav", 12) !!}
            </div>
         </nav>
         <section class="rosy-body">

            <article class="container-fluid">

               <header class="rosy-header">

                  <h4>{{$title}}</h4>
                  <x-cursor-navigator :index="12"/>

               </header>

               <section class="{{$container}}">

                  @yield("content", "Content Page")

               </section>
            </article>

         </section>
         <!-- <aside class="rosy-aside">
            Aside
         </aside> -->
      </main>
   @endsection

   @section("js")
      @parent<script src="{{__url('__rosy/js/admin-ui.js')}}"></script>
   @endsection
