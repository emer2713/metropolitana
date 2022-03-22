<div class="col-md-4 d-flex">
    <div class="container-fluid">
        <div class="panel shadow">

            <div class="header">
                <h2 class="title">
                    <i class="fas fa-globe"></i>
                    Modulo Subclasificaciones
                </h2>
            </div>

            <div class="inside">
                <div class="form-check">
                    <input type="checkbox" value="true" name="subclassifications" @if (kvfj($user->permissions, 'subclassifications')) checked @endif>
                    <label for="subclassifications">
                        Puede ver el listado.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="subclassifications_add" @if (kvfj($user->permissions, 'subclassifications_add')) checked @endif>
                    <label for="subclassifications_add">
                        Puede agregar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="subclassifications_edit" @if (kvfj($user->permissions, 'subclassifications_edit')) checked @endif>
                    <label for="subclassifications_edit">
                        Puede editar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="subclassifications_delete" @if (kvfj($user->permissions, 'subclassifications_delete')) checked @endif>
                    <label for="subclassifications_delete">
                        Puede elimiar.
                    </label>
                </div>
            </div>

        </div>
    </div>
</div>
