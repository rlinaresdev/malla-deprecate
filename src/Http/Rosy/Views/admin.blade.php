@extends("rosy::master")

   @section("css")
      @parent <link href="{{__url('__rosy/css/admin-ui.css')}}" rel="stylesheet">
   @endsection

   @section("body")

      <main role="rosy" class="admin">
         <nav class="rosy-nav">

            <div class="nv-0">
               <div class="nav">
                  <a href="{{__url('admin')}}" class="nav-link">
                     <i class="mdi mdi-home"></i>
                  </a>
                  <a href="{{__url("admin/users")}}" class="nav-link">
                     <i class="mdi mdi-web"></i>
                  </a>
                  <a href="{{__url("admin/users")}}" class="nav-link">
                     <i class="mdi mdi-account-cog-outline"></i>
                  </a>
               </div>
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
               Admin Panel
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
