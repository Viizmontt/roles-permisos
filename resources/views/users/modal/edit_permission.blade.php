<div class="modal fade" id="editPermission{{$permission->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-bg-black">
            <div class="modal-header bg-navy">
                <h5 class="modal-title" id="exampleModalLabel">Editar Permiso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editPermissionForm" action="{{ route('permission.update', $permission->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="col-form-label">Nombre de Permiso: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name_permission"
                            placeholder="Ingrese el nombre del permiso" required value="{{$permission->name}}">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn bg-navy">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>