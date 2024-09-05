<div class="modal fade" id="editRole{{ $role->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-bg-black">
            <div class="modal-header bg-navy">
                <h5 class="modal-title" id="exampleModalLabel">Editar Rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('rol.update', $role->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="col-form-label">Nombre de Rol: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name_role"
                            placeholder="Ingrese el nombre del rol" required value="{{ $role->name }}">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn bg-navy">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>