<div class="col-md-4 d-flex">
    <div class="container-fluid">
        <div class="panel shadow">

            <div class="header">
                <h2 class="title">
                    <i class="far fa-file-image"></i>
                    Modulo Multimedia
                </h2>
            </div>

            <div class="inside">

                <div class="form-check">
                    <input type="checkbox" value="true" name="multimedia" @if (kvfj($user->permissions, 'multimedia')) checked @endif>
                    <label for="multimedia">
                        Puede ver el listado.
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" value="true" name="multimedia_add" @if (kvfj($user->permissions, 'multimedia_add')) checked @endif>
                    <label for="multimedia_add">
                        Puede agregar.
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" value="true" name="multimedia_edit" @if (kvfj($user->permissions, 'multimedia_edit')) checked @endif>
                    <label for="multimedia_edit">
                        Puede editar.
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" value="true" name="multimedia_delete" @if (kvfj($user->permissions, 'multimedia_delete')) checked @endif>
                    <label for="multimedia_delete">
                        Puede elimiar.
                    </label>
                </div>

            </div>

        </div>
    </div>
</div>
