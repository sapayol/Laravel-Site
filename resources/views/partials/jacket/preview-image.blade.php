<?php
  $jacket = $order->jacket;
  $lining_color = $order->lining_color()->name;
  $hardware_color = $order->hardware_color()->name;
  if ($jacket->model === 'linden') {
    $collar_color = ($order->collar_color()->name === 'black' || $order->collar_color()->name === 'brown' ? 'fur-1' : 'fur-2');
    $front_image = $lining_color . '-' . $hardware_color . '-' . $collar_color;
  } else {
    $front_image = $lining_color . '-' . $hardware_color;
  }
?>

<img class="customization-image" src="/images/photos/jackets/{{{ $order->jacket->model }}}/variations/{{{ $order->leather_color()->name }}}/{{{ $front_image }}}-medium.jpg" alt="Jacket Photo">