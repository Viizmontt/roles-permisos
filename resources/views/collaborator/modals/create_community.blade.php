<div class="modal fade" id="newCommunity" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-bg-info">
            <div class="modal-header bg-indigo">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Comunidad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('community.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-form-label">Nombre de la Comunidad: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name_community"
                            placeholder="Ingrese el nombre la comunidad" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Descripción de la Comunidad:</label>
                        <textarea class="form-control" name="description_community" rows="2"
                            placeholder="Ingrese la descripción de la comunidad"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn bg-indigo">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>