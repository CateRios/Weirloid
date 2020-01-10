@foreach($users as $user)

        <div class="row list">

            <div class="col-md-1">
                <i class="fas fa-user avatarIcon"></i>
            </div>

            <div class="col-md-11 data">
                <h3 class="name">{{$user->name}}</h3>
                <p class="datum"><strong>Email: </strong>{{$user->email}} <br/>
                <strong>Fecha de creación: </strong>{{$user->created_at}}&nbsp;&nbsp;&nbsp;<strong>Última actualización: </strong>{{$user->updated_at}}</p>
            </div>

        </div>

@endforeach

{{$users->links('general.paginator')}}

