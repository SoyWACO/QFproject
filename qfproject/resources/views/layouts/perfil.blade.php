<!-- PANEL DEL PERFIL DE USUARIO -->
<div class="box box-success">
    <div class="box-body box-profile">
        <a href="{{ url('images/users/' . Auth::user()->imagen) }}" target="_blanck">
            <img src="{{ asset('images/users/' . Auth::user()->imagen) }}" class="profile-user-img img-responsive img-circle" alt="Imagen de usuario">
        </a>
        @if (!Auth::user()->visitante())
            <h3 class="profile-username text-center">
                {{ Auth::user()->name }} {{ Auth::user()->lastname }}
            </h3>
        @endif
        <p class="text-muted text-center">
            {{ Auth::user()->tipo }}
        </p>
        @if (!Auth::user()->visitante())
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <strong>
                        Usuario
                    </strong>
                    <p class="pull-right">
                        {{ Auth::user()->username }}
                    </p>
                </li>
         
                <li class="list-group-item">
                    <strong>
                        Correo electrónico
                    </strong>
                    <p class="pull-right">
                        {{ Auth::user()->email }}
                    </p>
                </li>
            </ul>
        @endif
        <a href="{{ route('reservaciones.paso-uno') }}" class="btn btn-success btn-block">
            Nueva reservación
        </a>
        @if (!Auth::user()->visitante())
            <a href="{{ route('editar-perfil') }}" class="btn btn-default btn-block">
                Editar perfil
            </a>
        @endif
    </div>
</div>