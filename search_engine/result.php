<!DOCTYPE html>
<html>
<head>
	<title>Result Found</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

	<style type="text/css">
		
		.result{

			margin-left: 10%;
			margin-right: 25%;
			margin-top: 12px;

		}

	</style>
</head>
<body>

	<div class="container-fluid">
			<form action="result.php" method="get">
				<div class="row" style="background: #f2f2f2">
					<div class="col-sm-1">
						<a href="search.php"><img src="img/ss_engine.jpg" height="60px"></a>
					</div>

					<div class="col-sm-6" style="margin-left:15px">
						<div class="input-group" style="margin-top: 10px">
							<input type="text" name="search" class="form-control">
							<span class="input-group-btn">
								<input type="submit" class="btn btn-secondary" name="search_button" value="Go!">
							</span>
						</div>
					</div>
				</div>
			</form>
		
	</div>
	<div class="result">
		<table>
			<tr>
			
			<?php

			  mysql_connect("localhost","root","");
			  mysql_select_db("search");

			  if(isset($_GET['search_button']))
			  {
			  	$search=$_GET['search'];

			  	if($search=="")
			  	{
			  		echo "<center><b>Opps! Search box is empty </b></center>";
			  		exit();
			  	}

			  	$sql="select * from website where site_key like '%$search%' limit 0,5";

			  	$rs=mysql_query($sql); 

			  	if(mysql_num_rows($rs)<1)
			  	{
			  		echo "<center><h4><b></b>Opps!!! No result found.  </h4></center>";
			  		exit();
			  	}

			  	echo "<font size='+1' color='#1a1aff'> Images for $search</font>";

			  	while ($row = mysql_fetch_array($rs)) 
			  	{
			  		echo "<td>

			  		         <table style='margin-top:10px'>
			  		             <tr>
			  		                 <td>
			  		                    <a target='_blank' href='images.php?id=$search'>
			  		                    <img src='img/$row[5]' height='100px'></a>
			  		                 </td>
			  		             </tr>
			  		         </table>


			  		      </td>";
			  	}


			  }




			?>

		    </tr>
	    </table>

	    <?php

	    echo "<a target='_blank' href='images.php?id=$search'><font size='+1' color='#1a1aff'>More Images for $search</font></a>";
        
        echo "<hr>";

        $sql1="select * from website where site_key like '%$search%'";
        $rs1=mysql_query($sql1);
        while ($row1=mysql_fetch_array($rs1)) {

        	echo "<a href='$row1[2]'><font size='4' color='#0000cc'><b>$row1[1]</b></font></a><br>";
        	echo "<font size='3' color='#006400'>$row1[2]</font><br>";
        	echo "<font size='3' color='#666666'>$row1[4]</font><br><br>";
        
        	
        }


	    ?>

	
	</div>    


	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


</body>
</html>