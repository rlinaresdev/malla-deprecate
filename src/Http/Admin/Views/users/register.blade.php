@extends( $skin->path("admin.dash") )

   @section("content")

      <article class="box">
         <header class="box-header">
            <h4>Formulario</h4>
         </header>

         <section class="box-body">
            <article class="block">
               <form action="{{__url('current')}}" method="POST">

                  <div class="form-group">
                     {!! $errors->first(
                        "firstname", '<p class="error">:message</p>'
                     ) !!}
                     <div class="form-floating">
                        <input type="text"
                                 name="firstname"
                                 value="{{old('firstname')}}"
                                 id="firstname"
                                 class="form-control"
                                 placeholder="Nombre"
                                 autocomplete="off">
                        <label for="firstname">Nombre</label>
                     </div>
                  </div>

                  <div class="form-group">
                     {!! $errors->first(
                        "lastname", '<p class="error">:message</p>'
                     ) !!}
                     <div class="form-floating">
                        <input type="text"
                                 name="lastname"
                                 value="{{old('lastname')}}"
                                 id="lastname"
                                 class="form-control"
                                 placeholder="Apellidos"
                                 autocomplete="off">
                        <label for="lastname">Apellidos</label>
                     </div>
                  </div>                 

                  <div class="form-group">
                     {!! $errors->first(
                        "email", '<p class="error">:message</p>'
                     ) !!}
                     <div class="form-floating">
                        <input type="email"
                                 name="email"
                                 value="{{old('email')}}"
                                 id="email"
                                 class="form-control"
                                 placeholder="Correo Electronico"
                                 autocomplete="off">
                        <label for="email">Correo Electronico</label>
                     </div>
                  </div>

                  <div class="form-group">
                     {!! $errors->first(
                        "password", '<p class="error">:message</p>'
                     ) !!}
                     <div class="form-floating">
                        <input type="password"
                                 name="password"
                                 value="{{old('password', Str::random(12))}}"
                                 id="password"
                                 class="form-control"
                                 placeholder="Contracena"
                                 autocomplete="off">
                        <label for="password">Contracena</label>
                     </div>
                  </div>

                  <div class="form-group">
                     {!! $errors->first(
                        "type", '<p class="error">:message</p>'
                     ) !!}
                     <div class="form-floating">
                        <select class="form-select" name="type" id="rol">
                           @foreach(get_users_rols() as $rol )
                           <option value="{{$rol}}">{{ucwords($rol)}}</option>
                           @endforeach
                        </select>
                        <label for="rol">Rol del usuario</label>
                     </div>
                  </div>

                  <div class="form-group">
                     @csrf
                     <button type="submit" class="btn btn-secondary">
                        Crear usuario
                     </button>
                  </div>

               </form>
            </article>
         </section>
      </article>
   @endsection
