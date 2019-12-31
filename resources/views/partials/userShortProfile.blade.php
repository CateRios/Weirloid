
@if($profile == null)


    <div class='col-6'>
        <p style='margin: 11% 0; padding: 0;text-align: justify' id='description'>En esta red social podrás compartir la información de tus canales así como ver los de tus amigos y compartir mensajes con ellos.</p>
    </div>

    <div class='col-5'>
        <img class='user_shortPhoto' id='user_photo' src='{{URL::asset('img/dummy_user_picture.jpg')}}'>
    </div>


@else

    @if($profile->photo != null && $profile->name != null)



    @elseif($profile->image != null && $profile->description == null)



    @elseif($profile->image == null && $profile->description != null)



    @endif

@endif
