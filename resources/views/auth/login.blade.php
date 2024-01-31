<!doctype html>
<html lang="en">
    <head>
        <title>Login</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>

                <!-- Section: Design Block -->
        <section class=" text-center text-lg-start">
        <style>
            .rounded-t-5 {
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
            }

            @media (min-width: 992px) {
            .rounded-tr-lg-0 {
                border-top-right-radius: 0;
            }

            .rounded-bl-lg-5 {
                border-bottom-left-radius: 0.5rem;
            }
            }
        </style>


        <div class="card mb-3" style="background-color:aliceblue">
            <div class="row g-0 d-flex align-items-center">
            <div class="col-lg-4 d-none d-lg-flex">
                <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Trendy Pants and Shoes"
                class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
            </div>
            <div class="col-lg-8">
                <div class="card-body py-5 px-md-5">
                <h1>Iniciar sesion</h1>

                <form action="{{route('login')}}" method="post">
                    @csrf
                    <!-- Email input (controlar limite de caracteres ingresados con required)-->
                    <div class="form-outline mb-4">
                        <input type="email" name= "email" id="form2Example1" class="form-control" required maxlength="30" autocomplete="off"/>
                        <label class="form-label" for="form2Example1">Ingresa tu correo &ensp;</label>
                        <!-- mostrar error en caso de llenar mal los campos-->
                        @error('email')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                        <input type="password" name="password" id="form2Example2" class="form-control" required maxlength="30" />
                        <label class="form-label" for="form2Example2">Contraseña &ensp;</label>
                        <!-- mostrar error en caso de llenar mal los campos-->
                        @error('password')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                        </div>

                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4">
                            <div class="col d-flex justify-content-center">
                            <!-- Checkbox
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                            <label class="form-check-label" for="form2Example31"> Recordar mi usuario</label>
                            </div>-->
                        </div>

                        <div class="col">
                            <!-- Simple link -->
                            <label class="form-label" for="formExample31">No tienes cuenta?</label>
                            <a href="{{route('register')}}">Registrate</a>

                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="Submit" class="btn btn-primary btn-block mb-4">Ingresar</button>

                </form>

                </div>
            </div>
            </div>
        </div>
        </section>
        <!-- Section: Design Block -->


        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
