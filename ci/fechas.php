<?
$date = date('Y-m-d H:i:s');
$fecha1 = new DateTime("2015-01-10 18:16:16");
$fecha2 = new DateTime($date);
$fecha = $fecha1->diff($fecha2);
//printf('%d años, %d meses, %d días, %d horas, %d minutos', $fecha->y, $fecha->m, $fecha->d, $fecha->h, $fecha->i);
printf('%d meses, %d días, %d horas, %d minutos', $fecha->m, $fecha->d, $fecha->h, $fecha->i);
?>