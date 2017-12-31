<?php
  include("database.php");
//add to the discussion
$id=$_POST['id'];
 
// Find highest answer number. 
$sql="SELECT MAX(a_id) AS maxa_id FROM fanswer WHERE question_id='$id'";
$result=mysqli_query($con,$sql);
$rows=mysqli_fetch_array($result);
// add + 1 to highest answer number and keep it in variable name "$Max_id". if there no answer yet set it = 1 
if ($rows) {
$max_id = $rows['maxa_id']+1;
}
else {
$max_id = 1;
}
 
// get values that sent from form 
$a_name=$_POST['a_name'];
$a_email=$_POST['a_email'];
$a_answer=$_POST['a_answer']; 
 
$datetime=date("d/m/y H:i:s"); // create date and time
 
// Insert answer 
$sql2="INSERT INTO fanswer(question_id, a_id, a_name, a_email, a_answer, a_datetime) VALUES('$id', '$max_id', '$a_name', '$a_email', '$a_answer', '$datetime')";
$result2=mysqli_query($con,$sql2);
 
if($result2){
echo "Successful<BR>";
echo "<a href='view_topic.php?id=".$id."'>View your answer</a>";
 
// If added new answer, add value +1 in reply column 
$tbl_name2="fquestions";
$sql3="UPDATE $tbl_name2 SET comments='$max_id' WHERE id='$id'";
$result3=mysqli_query($con,$sql3);
  
}
else {
echo "ERROR";
echo mysqli_error($con);
}
 
// Close connection
mysqli_close($con);
?>
