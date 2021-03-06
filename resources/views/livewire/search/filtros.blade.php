{{--Logica--}}
    @php
        //Cuenta la cantidad de resultados de la busqueda
        $cantidad_resultados = 0;

        foreach (@$results as $resultado) {
            if (@$resultado->ventas->first()->estado === 'activo') {
                @$cantidad_resultados++;
            }
        }

        //Selecciona todas las provincias de la que provienen los productos y
        //las filtra para que no se repitan
        $provincias = [];

        foreach (@$results as $item) {
            if (@$item->ventas->first()->estado === 'activo')
                @$provincias[] = @$item->ventas->first()->users->provincias->name;
        }

        @$resultadoProvincias = array_unique($provincias);
        @$totalProvincias = 0;
        foreach (@$resultadoProvincias as $key) {
            @$totalProvincias += 1;
        }

        //Cuenta los items nuevos y los usados
        $nuevos = 0;
        $usados = 0;
        $reacondicionado = 0;
        
        foreach (@$results2 as $key) {
            if (@$key->estado === 'Nuevo') {
                if (@$key->ventas->first()->estado === 'activo')
                    $nuevos += 1;
            }
            if(@$key->estado === 'Usado'){
                if (@$key->ventas->first()->estado === 'activo')
                    $usados += 1;
            }
            if(@$key->estado === 'Reacondicionado'){
                if (@$key->ventas->first()->estado === 'activo')
                    $reacondicionado += 1;
            }
        }

        $totalCondicion = $nuevos + $usados + $reacondicionado;

        if (@App\Categoria::where('id', $busqueda)->first()->categoria) {
            $busquedaInfo = App\Categoria::where('id', $busqueda)->first()->categoria;
        }else{
            $busquedaInfo = $busqueda;
        }
        
    @endphp

<h1 class="text-capitalize">{{ $busquedaInfo }}</h1>

<em class="ml-auto text-secondary">{{ $cantidad_resultados }} resultados</em>

{{--Informacion sobre los filtros seleccionados--}}
    @if (@$condicion !== Null && @$condicion !== 'n/a' || @$provincia !== Null && @$provincia !== 'n/a')
        <br><br>
    @endif

    @if (@$condicion !== Null && @$condicion !== 'n/a')
        <label>
            <input 
            type="radio" 
            wire:model="condicion" 
            value="n/a" 
            name="condicion"
            style="visibility: hidden;
                    margin-left: -15px"
            >
            <em style="border: 1px solid rgba(122, 122, 122, 0.281);
                        border-radius: 10% 10% 10% 10%;
                        height: 20px;
                        padding-left: 3px;
                        padding-right: 3px;
                        background-color: white"
            >
                {{ $condicion }}
                &nbsp;
                <i class="fas fa-times-circle"></i>
            </em>
            &nbsp;
        </label>
    @endif

    @if (@$provincia !== Null && @$provincia !== 'n/a')

        <label>
            <input 
            type="radio" 
            wire:model="provincia" 
            value="n/a" 
            name="provincia"
            style="visibility: hidden;
                    margin-left: -15px"
            >
            <em style="border: 1px solid rgba(122, 122, 122, 0.281);
                        border-radius: 10% 10% 10% 10%;
                        height: 20px;
                        padding-left: 3px;
                        padding-right: 3px;
                        background-color: white"
            >
                {{ $provincia }}
                &nbsp;
                <i class="fas fa-times-circle"></i>
            </em>
            &nbsp;
        </label>

    @endif

<br><br>
{{--Por Precio--}}    
    <h4>Ordenar publicaciones</h4>
    <select name="orderByPrice" wire:model="orderByPrice" class="no-arrow">
        <option value="n/a">Mas Relevante</option>
        <option value="desc">Mayor Precio</option>
        <option value="asc">Menor Precio</option>
    </select>

<br><br>
{{--Por Condicion--}}

    @if (@$totalCondicion > 1)
        <h4>Condicion</h4>
        <div class="form-group">
            <ul class="list-unstyled">
                @if (@$nuevos >= 1)
                    <li>
                        <label>
                            <input type="radio" wire:model="condicion" value="Nuevo" name="condicion">
                            <em>Nuevo ({{ $nuevos }})</em>
                        </label>
                    </li>
                @endif
                @if (@$usados >= 1)
                    <li>
                        <label>
                            <input type="radio" wire:model="condicion" value="Usado" name="condicion">
                            <em>Usado ({{ $usados }})</em>
                        </label>
                    </li>
                @endif
                @if (@$reacondicionado >= 1)
                    <li>
                        <label>
                            <input type="radio" wire:model="condicion" value="Reacondicionado" name="condicion">
                            <em>Reacondicionado ({{ $reacondicionado }})</em>
                        </label>
                    </li>
                @endif
            </ul>
        </div>
    @endif

{{--Por Ubicacion--}}
    @if (@$totalProvincias > 1 && $provincia === Null || $provincia === 'n/a')
        <h4>Ubicacion</h4>
        <ul class="list-unstyled">
            @foreach ($resultadoProvincias as $item)
                <li>
                    <label>
                        <input 
                        type="radio" 
                        wire:model="provincia" 
                        value="{{ $item }}" 
                        name="provincia"
                        style="visibility: hidden;
                                margin-left: -12px"
                        >
                        <em>{{ $item }}</em>
                    </label>
                </li>
            @endforeach
        </ul>
    @endif