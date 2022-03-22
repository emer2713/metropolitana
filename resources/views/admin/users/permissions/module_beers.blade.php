<div class="col-md-4 d-flex">
    <div class="container-fluid">
        <div class="panel shadow">

            <div class="header">
                <h2 class="title">
                    <i class="fas fa-beer"></i>
                    Modulo Cervezas
                </h2>
            </div>

            <div class="inside">
                <div class="form-check">
                    <input type="checkbox" value="true" name="beers" @if (kvfj($user->permissions, 'beers')) checked @endif>
                    <label for="beers">
                        Puede ver el listado.
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" value="true" name="beers_add" @if (kvfj($user->permissions, 'beers_add')) checked @endif>
                    <label for="beers_add">
                        Puede agregar Cervezas.
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" value="true" name="beers_edit" @if (kvfj($user->permissions, 'beers_edit')) checked @endif>
                    <label for="beers_edit">
                        Puede editar.
                    </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" value="true" name="beers_delete" @if (kvfj($user->permissions, 'beers_delete')) checked @endif>
                    <label for="beers_delete">
                        Puede eliminar.
                    </label>
                </div>

            </div>

        </div>
    </div>
</div>
