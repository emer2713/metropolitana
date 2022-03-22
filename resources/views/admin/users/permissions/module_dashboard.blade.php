<div class="col-md-4" >
    <div class="container-fluid">

        <div class="panel shadow">

            <div class="header">
                <h2 class="title">
                    <i class="fas fa-home"></i>
                    Modulo Dashboard
                </h2>
            </div>

            <div class="inside">
                <div class="form-check">
                    <input type="checkbox" value="true" name="dashboard" @if (kvfj($user->permissions, 'dashboard')) checked @endif>
                    <label for="dashboard">
                        Puede ver el dashboard.
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="true" name="dashboard_small_stats" @if (kvfj($user->permissions, 'dashboard_small_stats')) checked @endif>
                    <label for="dashboard_small_stats">
                        Puede las estadísticas.
                    </label>
                </div>
            </div>

        </div>

    </div>
</div>
