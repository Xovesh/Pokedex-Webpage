<?php include_once('/phpspripts/other/sess.php'); 

			include 'DbConfig.php';
		        $link = mysqli_connect($dbserver,$dbuser,$dbpass,$basededatos);
		        if(!$link){
		            die("Fallo al conectar con la base de datos: " .mysqli_connect_error());
		        }
		        
		        $sql = "SELECT * FROM user;";
		        $resul = mysqli_query($link,$sql);
				if(!$resul){
					echo(mysqli_error($link));
				}
				echo "<table>";
				echo "<tr>
						<th>EMAIL</th>
						<th>PASS</th>
					</tr>";

			 	while($row = mysqli_fetch_array($resul)){
			 		 $id=$row['email'];
			 	 echo "<tr><td>".$row['email']."</td><td>".$row['pass'].
			 		 "</td><td>";
					 if ($row['active']==1){
						 echo"activo";
					 }else{ 
					echo("deshabilitado");}
					echo'</td></td></tr>';
		        }
		   	echo "</table>";
			





?>
