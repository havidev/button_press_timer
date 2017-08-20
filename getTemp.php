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
		$myMonth= $_GET['myM'];
		$myDay = $_GET['myD'];
		
        $con = mysqli_connect('localhost','root','minT235Apple@','temp_db');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }
		//The php variable has to be in single quotes surrounded by double quotes.
		$sqlCount="SELECT count(*) as myCount from temp_db.temp_test1 where month(date_time) ='".$myMonth."'and day(date_time)='".$myDay."'"; 
        $sql="SELECT * from temp_db.temp_test1 where month(date_time) ='".$myMonth."'and day(date_time)='".$myDay."'"; 
		
		
		//Query the most recent reading from the Database. 
		//$sql="SELECT * from temp_db.temp_test1 where month(date_time) =(select max(date_time)from temp_db.temp_test1)";
		
		//$sql="SELECT * from temp_db.temp_test1";
		
		
				
		 echo "<p>Number of readings:</p>
			<table>
				<tr>
                <th>Time</th>
                <th>Temp F</th>
                <th>Humidity</th>
            </tr>";
			
			
        
        $countResult = mysqli_query($con,$sqlCount);
		$row1 = mysqli_fetch_array($countResult);
		echo "<p>". $row1['myCount'] ."</p>";
		
			
		
		$result = mysqli_query($con,$sql);

         while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['date_time'] . "</td>";
            echo "<td>" . $row['tempF'] . "</td>";
            echo "<td>" . $row['humidity'] . "</td>";
            echo "</tr>";
        } 
        echo "</table>"; 
				
		
        
        mysqli_close($con);

       
    ?>
</body>
</html>
    
