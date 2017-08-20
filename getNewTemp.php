<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
<head>
    
<style>
    table{
        width: 100%;
        border-collapse: collapse;
    };

    table, td, th {
        border: 3px solid black;
        padding: 5px;
    };

    th {text-align: left;};
	td {text-align: center;};
</style>
</head>
<body>
   
    <?php
		
		
        $con = mysqli_connect('localhost','root','minT235Apple@','temp_db');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }
		
		//Query the most recent reading from the Database. 
		$sql="SELECT * from temp_db.temp_test1 where date_time =(select max(date_time)from temp_db.temp_test1)";
		
		 echo "<table>
				<tr>
                <th>Time</th>
                <th>Temp F</th>
                <th>Humidity</th>
            </tr>";

       
		
		//$row = mysqli_fetch_array($result);
		/* 
		$count = count($row);
		echo($count);
		for($x = 0; $x<$count;$x++){
			echo $row[$x];
			echo "<br>"; */
			
		$result = mysqli_query($con,$sql);
		$dateFormat;
         while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
			$dateFormat = date("m/d/Y h:i:sa",strtotime($row['date_time']));
			//" &#40".$dateFormat."&#41
            echo "<td>" . $row['date_time'] ."&nbsp;&nbsp;&#40;".$dateFormat."&#41;</td>";
            echo "<td>" . $row['tempF'] . "</td>";
            echo "<td>" . $row['humidity'] . "</td>";
            echo "</tr>";
        } 
        echo "</table>"; 
				
        mysqli_close($con);
		
    ?>
</body>
</html>