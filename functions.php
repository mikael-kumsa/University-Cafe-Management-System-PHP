<?php
// this function will simply display the student information
function display($studID){
    include('connection.php');
    $sql ="select * from student WHERE studID='$studID'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    echo "<div class='w3-row'>";
    echo "<div class='w3-quarter w3-container'>";
    echo "<img src='.$row[photo]' alt='Profile Pic' class='w3-image' width='500' height='300'>";
    echo "</div>";
    echo "<div class='w3-threequarter w3-container w3-text-green'>";
    echo "<h3>Name:  $row[firstName] $row[lastName]</h3>";  
    echo "<h3>Gender:  $row[gender]</h3>";  
    echo "<h3>Phone:  0$row[phoneNo]</h3>";  
    echo "<h3>Emergency Phone:  0$row[emergencyPhone] </h3>";  
    echo "<h3>Department:  $row[department] </h3>"; 
    echo "</div>";
    echo "</div>";
    echo "<hr>";
    echo "<div class='w3-row new'>";
    echo "<div class='w3-col  w3-container' style='width:25%'>";
    echo "</div>";
    echo "<div class='w3-col w3-text-green w3-container' style='width:35%'>";
    echo "<h3>Batch:  $row[batch] Year</h3>"; 
    echo "<h3>Department:  $row[department] </h3>"; 
    echo "<h3>CafeID:  $row[cafeID] </h3>"; 
    echo "</div>";
    echo "<div class='w3-col w3-container w3-text-green' style='width:40%'>";
    echo "</div>";
    echo "</div>";  
}
?>