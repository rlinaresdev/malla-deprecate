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

            <header class="rosy-header">
               <nav class="rosy-navbar d-flex flex-wrap justify-content-center mb-1">

                  <a href="#" class="d-flex align-items-center mb-md-0 me-md-auto">
                     <span class="fs-4">{{$title}}</span>
                  </a>
                  <ul class="nav nav-pills ms-auto">
                     <li class="nav-item">
                        <a href="#" class="nav-link px-2 py-1">
                           <i class="mdi mdi-bell-outline mdi-24px"></i>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="#" class="nav-link px-2 py-1">
                           <i class="mdi mdi-message-outline mdi-24px"></i>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="#" class="nav-link px-2 py-1">
                           <i class="mdi mdi-shield-account mdi-24px"></i>
                        </a>
                     </li>
                     <li class="nav-item nav-rtoggler">
                        <a href="#" class="nav-link px-2 ">
                           <i class="mdi mdi-wrap mdi-24px"></i>
                        </a>
                     </li>
                  </ul>
               </nav>

               <x-cursor-navigator :index="12"/>

            </header>

            <article class="rosy-content">

               <section class="{{$container}}">

                  @yield("content", "Content Page")

               </section>
            </article>

            <aside class="rosy-aside">
               <a href="#" class="rtoggler"><i class="mdi mdi-wrap"></i></a>
               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt corrupti nisi molestias laborum eligendi aliquam voluptas ab repellat veniam dicta aliquid veritatis mollitia, natus laudantium sequi expedita placeat, quaerat autem.
            </aside>

         </section>

      </main>
   @endsection

   @section("js")
      @parent<script src="{{__url('__rosy/js/admin-ui.js')}}"></script>
   @endsection
