<div class="modal-content">
    <form id="formUpdate" action="{{$vehicle->id ? route('vehicles.update',$vehicle) : route('vehicles.store')}}" method="post">
        <div class="modal-header">
            <h4 class="modal-title" id="modal-title">Nuevo</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @csrf
            @if($vehicle->id)
                @method('PUT')
                <input type="hidden" name="id", value="{{ $vehicle->id }}">
            @endif
            
            <div class="form-group">
                <label for="plate">Placa</label>
                <input type="text" class="form-control" id="plate" placeholder="Ingrese nombre" name="plate" value="{{$vehicle->plate}}">
                <div id="msg_plate"></div>
            </div>
            <div class="form-group">
                <label for="model">Modelo</label>
                <input type="text" class="form-control" id="model" placeholder="Ingrese nombre" name="model" value="{{$vehicle->model}}">
                <div id="msg_model"></div>
            </div>
            <div class="form-group">
                <label for="owner">Propietario</label>
                <input type="text" class="form-control" id="owner" placeholder="Ingrese nombre" name="owner" value="{{$vehicle->owner}}">
                <div id="msg_owner"></div>
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