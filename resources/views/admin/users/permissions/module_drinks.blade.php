<div class="col-md-4 d-flex">
    <div class="container-fluid">
        <div class="panel shadow">

            <div class="header">
                <h2 class="title">
                    <i class="fas fa-glass-cheers"></i>
                    Modulo Bebidas
                </h2>
            </div>

            <div class="inside">
                <div class="form-check">
                    <input type="checkbox" value="true" name="drinks" @if (kvfj($user->permissions, 'drinks')) checked @endif>
                    <label for="drinks">
                        Puede ver el listado.
                    </label>
                </div>

             
                <div class="form-check">
                    <input type="checkbox" value="true" name="drinks_add" @if (kvfj($user->permissions, 'drinks_add')) checked @endif>
                    <label for="drinks_add">
                        Puede agregar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="drinks_edit" @if (kvfj($user->permissions, 'drinks_edit')) checked @endif>
                    <label for="drinks_edit">
                        Puede editar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="drinks_delete" @if (kvfj($user->permissions, 'drinks_delete')) checked @endif>
                    <label for="drinks_delete">
                        Puede eliminar.
                    </label>
                </div>
            </div>

        </div>
    </div>
</div>
