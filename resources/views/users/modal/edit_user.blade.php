<div class="modal fade" id="editUser{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-bg-info">
            <div class="modal-header bg-navy">
                <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="col-form-label">Nombre de Usuario <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name_user"
                            value="{{ $user->name }}" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Email de Usuario <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email_user"
                            value="{{ $user->email }}" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Contraseña de Usuario <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password_user"
                            placeholder="Ingrese una nueva contraseña (opcional)">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn bg-navy">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
