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
                  <img src="{{__url($user->avatar)}}" alt="@" class="avatar avatar-circle">
                  {{$user->shortname}}

                  <span class="tool"><i class="mdi mdi-dots-vertical"></i></span>
               </h4>
               {!! Nav::tag("rightnav", 12) !!}
            </div>
         </nav>
         <section class="rosy-body">
            <article class="container-fluid">
               @yield("content", "Content Page")
            </article>
         </section>
         <aside class="rosy-aside">
            Aside
         </aside>
      </main>
   @endsection

   @section("js")
      @parent<script src="{{__url('__rosy/js/admin-ui.js')}}"></script>
   @endsection
