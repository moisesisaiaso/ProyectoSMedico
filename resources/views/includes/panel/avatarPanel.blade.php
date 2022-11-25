<?php
    $user = \Auth::user();

?>

@if(Auth::user()->image)
                
    <div style="width: 40px !important; height: 40px !important;border-radius: 900px !important; overflow: hidden !important;">
        <img src="{{route('getImage.user',['filename'=> $user->image])}}" alt="avatar" style="height: 100%">
    </div> <!-- $user->image  $user me devuelve el objeto de usuario autenticado encadeno su propiedad ->image para obtener la imagen que en este campo se almaceda como string ya que solo hace referencia al nombre de la imagen almacenada en el storage de users --> <!-- esto tambien se puede hacer con  Auth::user()->image que devuelve lo mismo (el nombre la imagen)-->
                
@else
    <span class="avatar-sm rounded-circle avatar">
        <i class="ni ni-circle-08 panel-Avatar-i"></i>
    </span>
@endif