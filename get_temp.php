<?php
/**
* @Programmer: AES
* @Description: Get sensor temperatures 
* 
**/
//phpinfo()
exec('sudo modprobe w1-gpio');
exec('sudo modprobe w1-therm');

$file = '/sys/bus/w1/devices/28*/w1_slave';

$files =glob($file);

//print_r($files);
$sensor_info  = array();
for($i=0;$i< count($files);$i++)
{
 $index = 'file'.$i;
$$index =$files[$i];

//Read the file line by line

/* $lines_index = 'lines'.$i;
$$lines_index = file($$index);
*/
${"lines".$i} = file(${'file'.$i});


//print_r(${"lines".$i});

$temp_index = "temp".$i; 
//Get the temp from second line 
${"temp".$i} = explode('=',${"lines".$i}[1]);
//echo "<br> checks".${"temp".$i}[1];

//Setup some nice formatting (i.e. 21,3)
$temp_c_index = "temp_c".$i;
$temp_f_index =  "temp_f".$i;


$$temp_c_index = number_format(${"temp".$i}[1] / 1000, 1, '.', '');
$$temp_f_index = $$temp_c_index * 9.0/5.0 + 32.0;
//echo "<br>check".$$temp_index[1];


/*
$sensor_28 = $temp_c.','.$temp_f;
$sensor_28_2 = $temp_c2.','.$temp_f2;
$sensor_28_3 = $temp_c3.','.$temp_f3;
*/
$sensor_28_index = "sensor_28_".$i;
if($$temp_f_index != "32")
{ 
	$$sensor_28_index =   $$temp_f_index;
}else
{
	$$sensor_28_index =   '';
}	



$sensor_info[$sensor_28_index] = $$sensor_28_index;

}
echo json_encode($sensor_info);

//$command = escapeshellcmd('/home/pi/thermometer.py');
//$output = shell_exec($command);
//echo $output.'here';
?>
