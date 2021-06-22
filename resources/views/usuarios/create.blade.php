

<!-- <!DOCTYPE html> -->

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-app-layout>
<head>
    <!--
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
 -->    <title>Usuarios</title>
    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
              <!--   <div class="mb-3 mt-5">
                    <h2>Usuarios</h2>
                </div> -->
               
              <!--   @if ($errors->any())
                    <div class="alert alert-warning" role="alert">
                        {{ $errors }}
                    </div>
                @endif -->

            @if(auth()->user()->role(auth()->user()->id) == 2)
                    <form class="bg-white shadow rounded py-3 px-4" action="{{ route('usuarios.store') }}" method="POST">
                        <div class="mb-3 mt-5">
                        <h2>Usuarios</h2>
                    </div>
                     @csrf
                        <label for="Tratamiento" class="form-label">"Tratamiento"</label>
                        <select  required class="form-select form-select-sm" id="tratamiento" name="tratamiento">
                            <option value="Sr" {{ old("tratamiento") == "Sr" ? "selected" : "" }}>"Sr"</option>
                            <option value="Sra" {{ old("tratamiento") == "Sra" ? "selected" : "" }}>"Sra"</option>                       
                        </select>

                        <label for="nombre" class="form-label">"Nombre"</label>
                        <input required type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger mb-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        
                        <label for="Apellido1" class="form-label">"Apellido1"</label>
                        <input required type="text" id="apellido1" name="apellido1" class="form-control" value="{{ old('apellido1') }}">
                        @error('apellido1')
                            <div class="alert alert-danger mb-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        
                        <label for="Apellido2" class="form-label">"Apellido2"</label>
                        <input required type="text" id="apellido2" name="apellido2" class="form-control" value="{{ old('apellido2') }}">
                        @error('apellido2')
                            <div class="alert alert-danger mb-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                         <label for="password" class="form-label">"Contraseña"</label>
                        <input required type="password" id="password" name="password" class="form-control" value="{{ old('password') }}"/>
                        @error('password')
                            <div class="alert alert-danger mb-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        
                         <label for="tipo" class="form-label">"Tipo"</label>
                        <select  required class="form-select form-select-sm" id="tipo" name="tipo">
                            <option value="fisica" {{ old("tipo") == "fisica" ? "selected" : "" }}>{{ ("Fisica") }}</option>
                            <option value="juridica" {{ old("tipo") == "juridica" ? "selected" : "" }}>{{ ("Juridica") }}</option>                       
                        </select>

                        
                        <label for="fecha" class="form-label">"Fecha"</label>
                        <input requied type="date" id="fecha" name="fecha" value="{{ old('fecha') }}" class="form-control" />

                        
                        <label for="dni" class="form-label">"DNI"</label>
                        <input requied type="text" id="dni" name="dni" class="form-control" value="{{ old('dni') }}">
                        @error('dni')
                            <div class="alert alert-danger mb-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        
                        <label for="email" class="form-label">"Email"</label>
                        <input requied type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                        @error('email')
                            <div class="alert alert-danger mb-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        
                        <label for="telefono" class="form-label">"Telefono"</label>
                        <input required type="text" id="telefono" name="telefono" class="form-control" value="{{ old('telefono') }}">
                        @error('telefono')
                            <div class="alert alert-danger mb-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        <br>
                        <h3>Dirección para notificaciones</h3>
                        
                        <label for="calle" class="form-label">"Calle"</label>
                        <input required type="text" id="calle" name="calle" class="form-control" value="{{ old('calle') }}">
                        @error('calle')
                            <div class="alert alert-danger mb-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                    
                         <label for="portal" class="form-label">"Portal"</label>
                        <input required type="text" id="portal" name="portal" class="form-control" value="{{ old('portal') }}">
                        @error('portal')
                            <div class="alert alert-danger mb-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        
                        <label for="bloque" class="form-label">{{ ("Bloque") }}</label>
                        <input required type="text" id="bloque" name="bloque" class="form-control" value="{{ old('bloque') }}">
                        @error('bloque')
                            <div class="alert alert-danger mb-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    
                       <label for="escalera" class="form-label">"Escalera"</label>
                        <input required type="text" id="escalera" name="escalera" class="form-control" value="{{ old('escalera') }}">
                        @error('escalera')
                            <div class="alert alert-danger mb-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    
                          <label for="piso" class="form-label">"Piso"</label>
                        <input required type="text" id="piso" name="piso" class="form-control" value="{{ old('piso') }}">
                        @error('piso')
                            <div class="alert alert-danger mb-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    
                         <label for="puerta" class="form-label">"Puerta"</label>
                        <input required type="text" id="puerta" name="puerta" class="form-control" value="{{ old('puerta') }}">
                        @error('puerta')
                            <div class="alert alert-danger mb-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    
                        <label for="codigo_pais" class="form-label">"Codigo pais"</label>
                        <input required type="text" id="codigo_pais" name="codigo_pais" class="form-control" value="{{ old('codigo_pais') }}">
                        @error('codigo_pais')
                            <div class="alert alert-danger mb-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        
                        <label for="cp" class="form-label">"CP"</label>
                        <input required type="text" id="cp" name="cp" class="form-control" value="{{ old('cp') }}">
                        @error('cp')
                            <div class="alert alert-danger mb-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    
                        <label for="pais" class="form-label">"País"</label>
                        <input required type="text" id="pais" name="pais" class="form-control" value="{{ old('pais') }}">
                        @error('pais')
                            <div class="alert alert-danger mb-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    
                        <label for="provincia" class="form-label">"Provincia"</label>
                        <input required type="text" id="provincia" name="provincia" class="form-control" value="{{ old('provincia') }}">
                        @error('provincia')
                            <div class="alert alert-danger mb-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    
                        <label for="localidad" class="form-label">"Localidad"</label>
                        <input required type="text" id="localidad" name="localidad" class="form-control" value="{{ old('localidad') }}">
                         @error('localidad')
                            <div class="alert alert-danger mb-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        <br>
                        <button type="submit" class="btn btn-secondary">Enviar</button>
                    </form>
                @else 
                    <div class="alert alert-warning">
                        <p>No tienes permisos de admnistrador en esta comunidad</p>
                    </div> 
            @endif

                <br><br>
                
                
            </div>
            <div class="col-4"></div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</x-app-layout>
</html>
