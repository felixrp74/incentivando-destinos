<?php

//conf.php, archivo de configuración de la base de datos

include 'conf.php';

//IP DEL VISITANTE

$ip = $_SERVER['REMOTE_ADDR'];

/*Seleccionamos la ip, la diferencia en tiempo entre la fecha actual y la almacenada

* en la base de datos, con la función de mysql TIMEDIFF(fecha de inicio, fecha final)

*/

$sql="select ip, TIMEDIFF(NOW(), fecha), fecha, num_votos from contador where ip='".$ip."'";

//Ejecutamos la instrucción SQL

$rs=mysqli_query($link, $sql) or die("Problemas al ejecutar select SQL 111111 ".mysqli_error($link));

/*Almacenados el resultado de la instrucción SQL en un arreglo asociativo con la función

mysql_fetch_array */

$fila=mysqli_fetch_array($rs);

$tiempo=$fila[1]; //Diferencia entre fecha guardada y fecha actual

$num_visitas=$fila[3]; //Número de visitas

$horas_t=substr($tiempo,0,2); //Número de horas transcurridas

$tiemRes = 5; //Varible de tiempo en horas para restringir la visita

/*Contamos el número de registros obtenidos en la consulta anterior, si el numero

* obtenido es igual a cero es porque dicho visitante es nuevo en el sito

* entonces agregamos su ip a la base de datos junto con un 1 y la fecha actual */

if (mysqli_num_rows($rs)==0)

{

$sql="insert into contador(ip, num_votos, fecha) values('$ip', 1, NOW())";

mysqli_query($link, $sql) or die("Problemas al ejecutar la insert SQL 22222 ".mysqli_error($link));

}

/* Si el número de registros obtenidos es mayor a cero es porque dicho visitante ha vuelto a ingresar al

* sitio, y si su tiempo transcurrido es mayor a 5 horas desde la primera vez que ingreso

* entonces actualizamos su número de votos agregando sumando 1 al valor actual,

* tambien actualizamos la fecha de su ultimo ingreso a la fecha actual

* */

//Si la ip existe y han transcurrido 5hrs

elseif (mysqli_num_rows($rs) > 0 && $horas_t > $tiemRes)

{

$sql="update contador set fecha=NOW(), num_votos='$num_visitas'+1 where ip='$ip'";

mysqli_query($link, $sql) or die("Problemas al ejecutar update SQL 33333 ".mysqli_error($link));

}

$sql="select SUM(num_votos) from contador"; //Obtenemos la suma de todas las visitas

$rs=mysqli_query($link, $sql) or die("Problemas al ejecutar select SQL 44444 ".mysqli_error($link));

$fila=mysqli_fetch_array($rs); //Almacenanos el resultado de la consulta en un arreglo

$num_visitas=$fila[0]; //Número de visitas

mysqli_close($link);

?>