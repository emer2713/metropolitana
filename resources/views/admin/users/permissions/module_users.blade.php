<div class="col-md-4 d-flex">
    <div class="container-fluid">
        <div class="panel shadow">

            <div class="header">
                <h2 class="title">
                    <i class="fas fa-user"></i>
                    Modulo Usuarios
                </h2>
            </div>

            <div class="inside">
                <div class="form-check">
                    <input type="checkbox" value="true" name="user_list" @if (kvfj($user->permissions, 'user_list')) checked @endif>
                    <label for="user_list">
                        Puede ver el listado.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="users_edit" @if (kvfj($user->permissions, 'users_edit')) checked @endif>
                    <label for="users_edit">
                        Puede editar.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="users_banned" @if (kvfj($user->permissions, 'users_banned')) checked @endif>
                    <label for="users_banned">
                        Puede banear/bloquear.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="users_permissions" @if (kvfj($user->permissions, 'users_permissions')) checked @endif>
                    <label for="users_permissions">
                        Puede otorgar permisos.
                    </label>
                </div>
            </div>

        </div>
    </div>
</div>
