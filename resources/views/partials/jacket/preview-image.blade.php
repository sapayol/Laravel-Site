<?php
  $jacket = $order->jacket;
  $lining_color = $order->lining_color()->name;
  $lining_color = $lining_color === 'bordeaux' ? 'red' : $lining_color;
  $hardware_color = $order->hardware_color()->name;
  $hardware_color = $hardware_color === 'graphite' ? 'gray' : $hardware_color;
  if ($jacket->model === 'linden') {
    $collar_color = ($order->collar_color() === '14' ? 'black' : 'gray');
    $front_image = $lining_color . '-' . $hardware_color . '-' . $collar_color;
  } else {
    $front_image = $lining_color . '-' . $hardware_color;
  }
?>

<img class="customization-image" src="/images/photos/jackets/{{{ $order->jacket->model }}}/variations/{{{ $front_image }}}-medium.jpg" alt="Jacket Photo">