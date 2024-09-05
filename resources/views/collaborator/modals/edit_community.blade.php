<div class="modal fade" id="editCommunity{{ $community->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-bg-info">
            <div class="modal-header bg-navy">
                <h5 class="modal-title" id="exampleModalLabel">Editar Comunidad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('community.update', $community->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="col-form-label">Nombre de la comunidad <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name_community') is-invalid @enderror" name="name_community"
                            value="{{ old('name_community', $community->name) }}" required>
                        @error('name_community')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Descripción de la comunidad</label>
                        <textarea class="form-control" name="description" rows="2">{{ old('description', $community->description) }}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn bg-navy">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>