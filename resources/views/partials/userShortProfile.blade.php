
@if($profile == null)

    <!-- Nombre del usuario -->
    <a class="user_shortName" id='name' href="profile">{{ Auth::user()->name }}</a>

    <!-- Imagen del usuario -->
    <img class='user_shortPhoto' id='user_photo' src="{{URL::asset('img/dummy_user_picture.jpg')}}">

@else

    @if($profile->photo != null)

        <a class="user_shortName" id='name' href="profile"><?php echo $profile->name ?></a>

        <img class='user_shortPhoto' id='user_photo' src='{{base64_decode($profile->photo)}}'>

    @elseif($profile->photo == null)

        <a class="user_shortName" id='name' href="profile"><?php echo $profile->name ?></a>

        <img class='user_shortPhoto' id='user_photo' src="{{URL::asset('img/dummy_user_picture.jpg')}}">

    @endif

@endif
