<div class="modal" tabindex="-1" role="dialog" id="usuario-{{$usuario->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Usuario "{{$usuario->nombre}}"</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro que desea eliminar la Usuario?</p>
            </div>
            <div class="modal-footer">
                <form action="{{route('usuario.destroy', $usuario->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Si</button>
                </form>
            </div>
        </div>
    </div>
</div>