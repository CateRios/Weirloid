
@if($profile == null)

    <!-- Nombre del usuario -->
    <a class="user_shortName" id='name' href="#">{{ Auth::user()->name }}</a>

    <!-- Imagen del usuario -->
    <img class='user_shortPhoto' id='user_photo' src='{{URL::asset('img/dummy_user_picture.jpg')}}'>

@else

    @if($profile->photo != null)

        <a class="user_shortName" id='name' href="#"><?php echo $profile->name ?></a>

        <img class='user_shortPhoto' id='user_photo' src='{{base64_decode($profile->photo)}}'>

    @elseif($profile->image == null)

        <a class="user_shortName" id='name' href="#"><?php echo $profile->name ?></a>

        <img class='user_shortPhoto' id='user_photo' src='{{URL::asset('img/dummy_user_picture.jpg')}}'>

    @endif

@endif
