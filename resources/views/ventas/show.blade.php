@extends('user.settings')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/ventas_show.css') }}">
@endsection

@section('panel')

<div class="col-sm-12 col-md-10 mb-5">
    <div class="row ml-5">
        <div class="col-12">
            <h3 class="mt-5"><b>Publicaciones</b></h3>
            <br>
            <br>
        </div>
        
        <div class="col-sm-12 col-md-12 col-lg-12">
            {{--Contactos por responder Y Publicaciones--}}
                @if ($ventas->count() >= 1)
                    
                    <div class="row">
                        
                        @foreach ($ventas as $venta)

                            <div class="col-12 mt-3">
                                {{--Contactos por responder--}}
                                <div class="card no-border">

                                    <div class="card-body" style="background-color: transparent;">
                                        <div class="row">

                                            <div class="col-3">
                                                
                                                <div class="img-content-compras text-center">
                                                    @if (@$venta->productos->images->first())
                                                        <img class="img-compras" src="{{ @$venta->productos->images->first()->url }}" alt="{{ $venta->productos->name }}">
                                                    @else
                                                        <img class="img-compras" src="{{ asset('images/no-image.png') }}" alt="no-image">
                                                    @endif
                                                </div>

                                            </div>

                                            <div class="col-4 mt-2">
                                                <span class="text-secondary" style="font-size: 10px;"> 
                                                    #{{ $venta->productos->id }} 
                                                </span>
                                                <p class="" style="font-size: 17px;">
                                                    <a href="{{ route('ventas.edit', $venta->id) }}" class="text-dark no-link">
                                                        {{ $venta->productos->name }}
                                                    </a>
                                                </p>
                                                <span class="text-secondary" style="font-size: 13px;">
                                                    {{ $venta->productos->stock }} Unidades | {{ $venta->transaccions->count() }} Ventas
                                                </span>
                                            </div>

                                            <div class="col-2 mt-5">
                                                <span class="text-secondary">
                                                    U$S{{ $venta->productos->precio }}
                                                </span>
                                            </div>

                                            <div class="col-3 mt-4">
                                                <span>
                                                    {{ $venta->estado }} - Gratuita
                                                </span>
                                                <p class="text-secondary">
                                                    Tiene exposicion minima                                                
                                                </p>
                                                <span class="text-success">
                                                    Envio {{ $venta->envios->metodo }}
                                                </span>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                        
                            </div>
                            
                        @endforeach

                    </div>

                @else

                    <div class="card no-border">

                        <div class="card-body" style="background-color: transparent;">
                    
                            <h5 class="mt-2 ml-5 mr-5">Aun no has publicado ningun articulo...  <a href="{{ route('ventas.create') }}">¡Empecemos con eso!</a></h5>
                        
                        <div>

                    </div>
                    
                @endif
        
        </div>        

    </div>
</div>
@endsection