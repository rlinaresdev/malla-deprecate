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
               <h4 class="title">Iipec</h4>
               <ul class="nav flex-column">
                  <li class="nav-item">
                     <a href="#" class="nav-link">Link 0</a>
                  </li>

                  <li class="nav-item">
                     <a href="#" class="nav-link">Link 1</a>
                  </li>
               </ul>
            </div>

         </nav>
         <section class="rosy-body">

            <article class="block">
               Admin Panels
               {!! Nav::tag("leftnav", 12) !!}
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
