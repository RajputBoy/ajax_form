<?php
$con2=mysqli_connect("localhost","root","");
mysqli_select_db($con2,"project2");
//check database connection
if(mysqli_connect_error()){
	echo "failed to connect Mysql:".mysqli_connect_error();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { //check for submit button
			
$query="INSERT INTO wp_employee (emp_name,emp_address,emp_mobile)   
VALUES('".$_POST['emp_name']."','".$_POST['emp_address']."','".$_POST['emp_mobile']."')";	
$result1=mysqli_query($con2,$query);
$query1="select * from wp_employee order by id desc";
//$query="SELECT count(*) as paging FROM registration_table ";
if($result=mysqli_query($con2,$query1)){
while($get=mysqli_fetch_assoc($result)){
	echo "<tr>";
	echo "<td>".$get['id']."</td>";
    echo "<td>".$get['emp_name']."</td>"; 
    echo "<td>".$get['emp_address']."</td>"; 
    echo "<td>".$get['emp_mobile']."</td>"; 
    echo "</tr>"; 
}
}else{
	echo "No matching records are found.";
}
}
   ?>   