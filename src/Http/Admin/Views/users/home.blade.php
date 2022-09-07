@extends( $skin->path("admin.dash") )

   @section("content")

      <article class="box">
         <header class="box-header">
            <a href="{{__url("admin/users/add")}}" class="btn btn-secondary btn-sm">
               <i class="mdi mdi-account-plus"></i> Nuevo cuenta
            </a>
         </header>

         <section class="box-body">

            <article class="block">

               <div class="responsive-table">
                  <table class="table table-hover">
                     <thead>
                        <tr>
                           <th class="tool">
                              <i class="mdi mdi-checkbox-blank-outline"></i>
                           </th>
                           <th class="avatar">Nombre</th>
                           <th>Email</th>
                           <th class="action">Acciones</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach( $users as $user )
                        <tr>
                           <td class="tool">
                              <i class="mdi mdi-checkbox-blank-outline"></i>
                           </td>
                           <td class="avatar">
                              {{$user->shortname}}
                           </td>
                           <td> {{$user->email}} </td>
                           <td class="action">EE</td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>

            </article>
         </section>
      </article>

   @endsection
