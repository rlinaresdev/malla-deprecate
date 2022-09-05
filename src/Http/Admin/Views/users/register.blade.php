@extends( $skin->path("admin.dash") )

   @section("content")

      <section class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12">

         <h4>{{$title}}</h4>

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
                                    value="{{old('password')}}"
                                    id="password"
                                    class="form-control"
                                    placeholder="Contracena"
                                    autocomplete="off">
                           <label for="password">Contracena</label>
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
      </section>

   @endsection
