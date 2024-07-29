@php
date_default_timezone_set('America/Lima');
$fechaActual = date('Y-m-d');
@endphp
<div class="modal-content">
    <form id="formUpdate" action="{{ $entry->id ? route('entries.update', $entry) : route('entries.store') }}" method="post">
        <div class="modal-header">
            <h4 class="modal-title" id="modal-title">Nuevo</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @csrf
            @if($entry->id)
                @method('PUT')
                <input type="hidden" name="id" value="{{ $entry->id }}">
            @endif
    
            <div class="form-group">
                <label for="plate">Placa</label>
                <select class="form-control" id="plate" name="plate" {{ $entry->plate ? "disabled" : "" }}>
                    @foreach($cars as $car)
                        <option value="{{ $car->plate }}" {{ $entry->plate == $car->plate ? 'selected' : '' }}>{{ $car->plate }}</option>
                    @endforeach
                </select>
                <div id="msg_plate"></div>
            </div>
            <div class="form-group">
                <label for="date">Fecha</label>
                @php
                    date_default_timezone_set('America/Lima');
                    $fechaActual = date('Y-m-d\TH:i');
                @endphp
                <input type="datetime-local" class="form-control" id="date" name="date" value="{{ $entry->date ? $entry->date : $fechaActual }}" disabled>
                <div id="msg_date"></div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="textoBoton" onclick="save()">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </form>
</div>