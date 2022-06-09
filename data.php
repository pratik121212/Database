<?php
$name = $_POST["name"];
$age = $_POST["age"];
$mobile = $_POST["mobile"];

$ser_name = "localhost";
$user = "root";

$connection_check = mysqli_connect($ser_name, $user,"", 'test_01');

if(mysqli_connect($ser_name, "root", "","section_i"))
    echo "Connection created";
else{
    die("Problem in connection".connect_error());
}

$insert_query = "INSERT INTO record(Name,Age,Mobile) VALUES('$name','$age','$mobile')";
if(mysqli_query($connection_check,$insert_query)){
    echo "Data Inserted 👍";
    header("refresh:2,url:Reg.html");
}
else{
    echo "Problem in query!";
}
$display_query = "SELECT Name,Age,Mobile from student_record";
$data = mysqli_query($connection_check, $display_query);
if(mysqli_num_rows($data) > 0){
    echo "<table border= 1px solid black>
    <tr><th>Name</th>
    <th>Age</th>
    <th>Mobile</th></tr>";
    while($row = mysqli_fetch_array($data)){
        echo "<tr>";
        echo "<td>".$row["Name"]."</td>";
        echo "<td>".$row["Age"]."</td>";
        echo "<td>".$row["Mobile"]."</td>";
        echo "</tr>";
    }
}

else
{
    echo "<h1 style='color:red'>No record Found!</h1>";
    header("refresh:3,url=Reg.html");
}


