<div class="col-md-4 d-flex">
    <div class="container-fluid">
        <div class="panel shadow">

            <div class="header">
                <h2 class="title">
                    <i class="far fa-folder-open"></i>
                    Modulo Categorias
                </h2>
            </div>

            <div class="inside">
                <div class="form-check">
                    <input type="checkbox" value="true" name="categories" @if (kvfj($user->permissions, 'categories')) checked @endif>
                    <label for="categories">
                        Puede ver el listado.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="categories_add" @if (kvfj($user->permissions, 'categories_add')) checked @endif>
                    <label for="categories_add">
                        Puede agregar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="categories_edit" @if (kvfj($user->permissions, 'categories_edit')) checked @endif>
                    <label for="categories_edit">
                        Puede editar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="categories_delete" @if (kvfj($user->permissions, 'categories_delete')) checked @endif>
                    <label for="categories_delete">
                        Puede elimiar.
                    </label>
                </div>
            </div>

        </div>
    </div>
</div>
