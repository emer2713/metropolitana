<div class="col-md-4 d-flex">
    <div class="container-fluid">
        <div class="panel shadow">

            <div class="header">
                <h2 class="title">
                    <i class="fas fa-code-branch"></i>
                    Modulo Clasificaciones
                </h2>
            </div>

            <div class="inside">

                <div class="form-check">
                    <input type="checkbox" value="true" name="classifications" @if (kvfj($user->permissions, 'classifications')) checked @endif>
                    <label for="classifications">
                        Puede ver el listado.
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" value="true" name="classifications_add" @if (kvfj($user->permissions, 'classifications_add')) checked @endif>
                    <label for="classifications_add">
                        Puede agregar.
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" value="true" name="classifications_edit" @if (kvfj($user->permissions, 'classifications_edit')) checked @endif>
                    <label for="classifications_edit">
                        Puede editar.
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" value="true" name="classifications_delete" @if (kvfj($user->permissions, 'classifications_delete')) checked @endif>
                    <label for="classifications_delete">
                        Puede elimiar.
                    </label>
                </div>

            </div>

        </div>
    </div>
</div>
