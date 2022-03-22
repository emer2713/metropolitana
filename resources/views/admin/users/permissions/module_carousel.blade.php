<div class="col-md-4 d-flex">
    <div class="container-fluid">
        <div class="panel shadow">

            <div class="header">
                <h2 class="title">
                    <i class="far fa-object-group"></i>
                    Modulo Carousel
                </h2>
            </div>

            <div class="inside">
                <div class="form-check">
                    <input type="checkbox" value="true" name="carousels" @if (kvfj($user->permissions, 'carousels')) checked @endif>
                    <label for="carousels">
                        Puede ver el listado.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="carousels_add" @if (kvfj($user->permissions, 'carousels_add')) checked @endif>
                    <label for="carousels_add">
                        Puede agregar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="carousels_edit" @if (kvfj($user->permissions, 'carousels_edit')) checked @endif>
                    <label for="carousels_edit">
                        Puede editar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="carousels_delete" @if (kvfj($user->permissions, 'carousels_delete')) checked @endif>
                    <label for="carousels_delete">
                        Puede elimiar.
                    </label>
                </div>
            </div>

        </div>
    </div>
</div>
