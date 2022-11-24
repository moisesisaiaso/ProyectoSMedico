<?php
    $user = \Auth::user();

?>
 @if(Auth::user()->image)
   <div class= "image"> <img src="{{route('getImage.user',['filename'=> $user->image])}}" alt="avatar" class="avatar form-Avatar"></div> <!-- $user->image  $user me devuelve el objeto de usuario autenticado, lo obtengo del controlador y encadeno su propiedad ->image para obtener la imagen que en este campo se almaceda como string ya que solo hace referencia al nombre de la imagen almacenada en el storage de users --> <!-- esto tambien se puede hacer con  Auth::user()->image que devuelve lo mismo (el nombre la imagen)-->
@else
    <span class="container-avatar"> <i class="ni ni-circle-08 form-Avatar-i"></i></span>

@endif