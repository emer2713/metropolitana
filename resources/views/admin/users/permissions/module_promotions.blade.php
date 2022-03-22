<div class="col-md-4 d-flex">
    <div class="container-fluid">
        <div class="panel shadow">

            <div class="header">
                <h2 class="title">
                    <i class="fas fa-tags"></i>
                    Modulo Paquetes
                </h2>
            </div>

            <div class="inside">
                <div class="form-check">
                    <input type="checkbox" value="true" name="promotions" @if (kvfj($user->permissions, 'promotions')) checked @endif>
                    <label for="promotions">
                        Puede ver el listado.
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" value="true" name="promotions_add" @if (kvfj($user->permissions, 'promotions_add')) checked @endif>
                    <label for="promotions_add">
                        Puede agregar.
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" value="true" name="promotions_edit" @if (kvfj($user->permissions, 'promotions_edit')) checked @endif>
                    <label for="promotions_edit">
                        Puede editar.
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" value="true" name="promotions_delete" @if (kvfj($user->permissions, 'promotions_delete')) checked @endif>
                    <label for="promotions_delete">
                        Puede eliminar.
                    </label>
                </div>

            </div>

        </div>
    </div>
</div>
