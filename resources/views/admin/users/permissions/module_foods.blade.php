<div class="col-md-4 d-flex">
    <div class="container-fluid">
        <div class="panel shadow">

            <div class="header">
                <h2 class="title">
                    <i class="fas fa-hamburger"></i>
                    Modulo Alimentos
                </h2>
            </div>

            <div class="inside">
                <div class="form-check">
                    <input type="checkbox" value="true" name="foods" @if (kvfj($user->permissions, 'foods')) checked @endif>
                    <label for="foods">
                        Puede ver el listado.
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" value="true" name="foods_add" @if (kvfj($user->permissions, 'foods_add')) checked @endif>
                    <label for="foods_add">
                        Puede agregar.
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" value="true" name="foods_edit" @if (kvfj($user->permissions, 'foods_edit')) checked @endif>
                    <label for="foods_edit">
                        Puede editar.
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" value="true" name="foods_delete" @if (kvfj($user->permissions, 'foods_delete')) checked @endif>
                    <label for="foods_delete">
                        Puede eliminar.
                    </label>
                </div>

            </div>

        </div>
    </div>
</div>
