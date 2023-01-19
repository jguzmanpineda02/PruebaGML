<div class="modal" tabindex="-1" role="dialog" id="categoria-{{$categoria->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar categoria "{{$categoria->nombre}}"</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro que desea eliminar la categoria?</p>
            </div>
            <div class="modal-footer">
                <form action="{{route('categoria.destroy', $categoria->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Si</button>
                </form>
            </div>
        </div>
    </div>
</div>