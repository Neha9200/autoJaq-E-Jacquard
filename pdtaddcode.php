<?php
session_start();
require_once 'Database.php';
header("Refresh:0 , url=productadd.php");

//CALLING STORED PROCEDURE TO INSERT RECORD
if (isset($_POST['submit'])) {
    $Pname = isset($_POST['Pname']) ? $_POST['Pname'] : '';
    $opqty = isset($_POST['opqty']) ? $_POST['opqty'] : 0;
    $cost = isset($_POST['cost']) ? $_POST['cost'] : 0;
    $mrp = isset($_POST['mrp']) ? $_POST['mrp'] : 0;
    $curqty = isset($_POST['curqty']) ? $_POST['curqty'] : 0;
    $unit = isset($_POST['unit']) ? $_POST['unit'] : '';
    $gst_tax = isset($_POST['gst_tax']) ? $_POST['gst_tax'] : 0;

if($Pname == null)
{
    echo"<script><alert>('Enter details')</script>";
} 
$sql = "CALL insert_pdt_records('".$Pname."', ".$opqty.", ".$cost.", ".$mrp.", ".$curqty.", '" .$unit. "', ".$gst_tax.")";
try{
    $success = $conn->query($sql);
    if($success){
        echo"<script>alert('Inserted succesfully')</script>";      
    }
    else{
        echo"<script>alert('Data not inserted')</script>";
        }
    }

catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}
mysqli_close($conn);
?>