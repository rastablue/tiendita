<div id="fifth-step" class="card shadow mb-4 h-100 w-100" style="{{$step5}}">

    <div class="card-body">

        <div class="col-md-12">
            <div class="form-group">
                <label class="mt-3">
                    <h5><b>Elige el metodo de pago y envio que convengas</b></h5>
                </label>
                <br>
                <br>
                <br>
                <em><b>Metodo de pago</b></em>
                <select 
                    name="pago" 
                    id="pago"
                    wire:model="pago" 
                    class="form-control steps-input mt-5 mb-5"
                    required="required"
                >
                    <option value="seleccione" selected>Seleccione un metodo de pago</option>
                    @foreach (@App\Pago::all() as $item)
                        <option value="{{ $item->id }}"> {{ $item->metodo }} </option>
                    @endforeach
                </select>
                @error('pago') 
                    <span class="error text-danger">{{ $message }}</span> 
                @enderror
                <br>
                <br>
                <em><b>Metodo de envio</b></em>
                <select 
                    name="envio" 
                    id="envio"
                    wire:model="envio" 
                    class="form-control steps-input mt-5 mb-5"
                    required="required"
                >
                    <option value="seleccione" selected>Seleccione un metodo de envio</option>
                    @foreach (@App\Envio::all() as $item)
                        <option value="{{ $item->id }}"> {{ $item->metodo }} </option>
                    @endforeach
                </select>
                <input type="hidden" name="precio_envio" value="0">
                @if ($precio_envio)
                    <div class="col-6">
                        <label for="precio" class="mt-1" style="color: rgba(128, 128, 128, 0.733);">Valor adicional del envio</label>
                        <br>
                        <input type="number" step="0.01" name="precio_envio" class="steps-input" value="1">
                        @error('precio') 
                            <span class="error text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                @endif
                @error('envio') 
                    <span class="error text-danger">{{ $message }}</span> 
                @enderror
            </div>
        </div>

    </div>

</div>

<button type="submit" id="submit-all" class="btn btn-primary float-right mt-2 mb-5" style="{{$step5}}">Siguiente</button>