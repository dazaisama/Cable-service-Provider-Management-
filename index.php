<?php error_reporting (E_ALL ^ E_NOTICE); ?> 
<?php
include("includes/header.php");
#session.destroy(); #after logged in other session variables are destroyed.
$month = date('M');
$sql="SELECT $month FROM monthly_payment_record m,customer_details c WHERE m.set_top_box_no=c.set_top_box_no"; 
$result=$con->query($sql);
while($row=$result->fetch_assoc())
{ 
    echo $row[$month]; 
}
$sql="SELECT count($month) FROM monthly_payment_record m,customer_details c WHERE m.set_top_box_no=c.set_top_box_no && $month NOT NULL"; 
echo $sql;

?>
<html>
    <head>
    <body>
        <div class="user_details column">
</div>
</body>
<div class="active">
</div>

</body>
</head>
</html>

