@extends("rosy::master")

   @section("body")
      <article class="container" style="margin-top:8%;">
         <section class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12">

            <article class="auth auth-form @if($errors->any()) auth-error @endif">
               <header class="auth-header text-center">
                  <h4>
                     <i class="mdi mdi-cog mdi-36px"></i>
                  </h4>
                  <h5 class="h5 mb-3 fw-normal">Porfavor identificate</h5>
                  {!! $errors->first("email", '<p class="error"> :message </p>') !!}
               </header>
               <section class="auth-body">
                  <article class="block">
                     <form action="{{__url("current")}}" method="POST">
                        <div class="form-floating">
                           <input type="email"
                                 name="email"
                                 value="{{old("email")}}"
                                 id="floatingMail"
                                 class="form-control"
                                 placeholder="name@exmample.com"
                                 autocomplete="off">
                           <label for="floatingMail">name@exmample.com</label>
                        </div>
                        <div class="form-floating">
                           <input type="password"
                                 name="password"
                                 value="{{old("password")}}"
                                 id="floatingPwd"
                                 class="form-control"
                                 placeholder="Clave de acceso"
                                 autocomplete="off">
                           <label for="floatingPwd">Clave de acceso</label>
                        </div>

                        <div class="checkbox my-2">
                           <label>
                              <input type="checkbox"
                                    name="remember"
                                    value="remember">
                              Recuerdame
                           </label>
                        </div>

                        @csrf()

                        <button class="btn btn-primary btn-lg w-100" type="submit">
                           Acceder
                        </button>

                        <hr>
                        <p class="mt-3 mb-0 text-muted text-center">&copy; 2017–2022</p>
                     </form>
                  </article>
               </section>
            </article>

         </section>
      </article>
   @endsection
