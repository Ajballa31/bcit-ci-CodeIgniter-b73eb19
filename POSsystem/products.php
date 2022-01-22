<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<link rel="stylesheet" type="text/css" href="css/css1.css">
<script>
	function toggle_visibility(id){
		var e = document.getElementById(id);
		if(e.style.display=='block')
			e.style.display = 'none';
		else
			e.style.display = 'block';
		}
</script>

<body>

<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:login.php');
	}
?>

<div id="container">
<div id="header">
<table cellspacing="0" width="100%" border="0" cellpadding="20px">
<tr>
	<td width="56%">
    <table width="41%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	    <th scope="col"><font size="12px">P</font><span style="font-size: 18px;">oint <b>O</b>f <b>S</b>ale System</span></th>
	    </tr>
	  </table></td>
    <td style="font-size:14px;">
      <table width="93%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        	<th scope="col">Welcome: <?php echo $_SESSION['access'];?></th>
          	<th scope="col"><?php
			$Today = date('y:m:d',time());
			$new = date('l, F d, Y', strtotime($Today));
			echo $new;
			?></th>
          	<th scope="col" width="20px"><a href="logout.php">
            <input type="button" id="btnadd" value="Logout" align="middle" />
          	</a></th>
        </tr>
  </table></td>
    </tr>

</table>
</div>

<br><br><br><br><br>
<!-- Footer -->
<div id = "headnav"> 
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>

	<td width="669" height="62">
	<table width="669" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	    <th width="90" height="56" scope="col"><a href="index.php">Dashboard</a></th>
	    <th width="50" scope="col"><a href="sales.php">Sales</a></th>
	    <th width="80" scope="col"><a href="products.php">Products</a></th>
	    <th width="90" scope="col"><a href="customers.php">Customers</a></th>
	    <th width="90" scope="col"><a href="supplier.php">Supplier</a></th>
	    <th width="112" scope="col"><a href="salesreport.php">Sales Report</a></th>
	    </tr>
	  </table>
      </td>
      
      <td width="13">
      <table border="0" cellspacing="0" cellpadding="0">
      	<tr>
        	<td align="left" style="color:#FFF">
            <?php
			$date_time=date("h:i:sa");
			
			echo $date_time;
			?>
            </td>
        </tr>
      </table>
      </td>

</tr>
</table>
</div>
<br>

<table width="83%" border="0" align="center" cellpadding="0" cellspacing="0">
      
      <tr>
        <td width="741" align="right">
        
        <form action="result_products.php" method="get" ecntype="multipart/data-form">
        <input type="text" name="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="Search product..." /><input type="submit" id="btnsearch" value="Search" name="search" />
        </form>
        
        </td>
        
        <td width="131" height="37">
        <a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')"><input type="button" id="btnadd" value="+ Add Products" /></a>
        </td>
      </tr>
    
    </table></th>
  </tr>
  
  <br>
  
  <tr>
    <td>
    <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #033; color:#033;">
    
     <tr>
     <th colspan="7" align="center" height="55px" style="border-bottom:1px solid #033; background: #033; color:#FFF;"> Products Information Table	</th>
    </tr>
    
      <tr height="30px">
        <th style="border-bottom:1px solid #333;"> Category </th>
        <th style="border-bottom:1px solid #333;"> Name </th>
        <th style="border-bottom:1px solid #333;"> Quantity Left </th>
        <th style="border-bottom:1px solid #333;"> Purchase </th>
        <th style="border-bottom:1px solid #333;"> Retail </th>
        <th style="border-bottom:1px solid #333;"> Supplier </th>
        <th style="border-bottom:1px solid #333;"> Action </th>
      </tr>
      
        <!-- Search goes here! -->
 

  
  		<!-- Search end here -->
      
       <?php
require('config.php');
$query="SELECT * FROM products";
$result=mysqli_query($db_link, $query);
while ($row=mysqli_fetch_array($result)){?>
      
      <tr align="center" style="height:25px">
      	<td style="border-bottom:1px solid #333;"> <?php echo $row['category']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['name']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['quantity']; ?> pcs. </td>
        <td style="border-bottom:1px solid #333;">Php <?php echo $row['purchase']; ?> </td>
        <td style="border-bottom:1px solid #333;">Php <?php echo $row['retail']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['supplier']; ?> </td>
        <td style="border-bottom:1px solid #333;">
        
        
        <a href="edit_item.php?id=<?php echo md5($row['id']);?>"><input type="button" value="Edit" style="width:50px; height:20; color:#FFF; background:#069; border:1px solid #069; border-radius:3px;"></a>/<a href="delete_item.php?id=<?php echo md5($row['id']);?>"><input type="button" value="Delete" style="width:15; height:20; color:#FFF; background: #900; border:1px solid #900; border-radius:3px;"></a>
        
        </td>
      </tr>
   <?php
}?>
      
    </table>
    
  </td>
  </tr>
</table>
<br><br><br>
<div id="bdcontainer"></div>

<div id="footer">
<table border="0" cellpadding="15px" align="center"; style="size: 12px; font-family: 'Courier New', Courier, monospace; color: #FFF; font-size: 12px;">
<tr>
	<td>
    &copy; 2015 All Rights Reserved.  |  Designed By:<a href="https://www.facebook.com/jun.magayanes">JMAGAYANES</a>	
    </td>
</tr>
</table>
</div>

</div>


<div id="popup-box1" class="popup-position">
<div id="popup-wrapper">
<div id="popup-container">
    <div id="popup-head-color1">
    <p style="text-align:right !important; font-family: 'Courier New', Courier, monospace;font-size:15px;"><a href= "javascript:void(0)" onclick="toggle_visibility('popup-box1')"><font color="#FFF"> X </font></a></p>
    <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;"> Add Item Form </p>
    </div>
    <br>
    <form action="add_item.php" method="POST">
    <table border="0" align="center">
    
    <tr>
    <td align="right">Category:</td>
    <td>
    <select name="category" id="txtbox">
    <option> Finger Food </option>
    <option> Dessert </option>
    <option> Hamburger </option>
    <option> Sandwich </option>
    </select>
    </td>
    </tr>
    
    <tr>
    <td align="right">Name:</td>
    <td><input type="text" id="txtbox" name="name" placeholder="Name" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Quantity:</td>
    <td><input type="text" id="txtbox" min="1" name="quantity" maxlength="11" placeholder="Quantity" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Purchse Amnt:</td>
    <td><input type="text" id="txtbox" name="purchase" maxlength="11" placeholder="Purchase amnt" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Retail:</td>
    <td><input type="text" id="txtbox" name="retail" maxlength="11" placeholder="Retail" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Supplier:</td>
    <td>
    <select name="supplier" id="txtbox">
    <?php
	$query="SELECT * FROM supplier";
	$result=mysqli_query($db_link, $query);
	while ($row=mysqli_fetch_array($result)){?>
    
	<option><?php echo $row['suppliername']; ?></option>
    					
	<?php
}?>
	</select>
</td>
    </tr>
    
    <br>
    <tr  align="left">
    <td>&nbsp;  </td>
    <td><input type="SUBMIT" id="btnnav" value="Submit"></a></td>
    </tr>
    
    </table>
    </form>

</div>
</div>
</div>

</body>
</html>
