<?php
error_reporting(E_ALL & ~E_DEPRECATED);
if(isset($_POST['search-submit']))
{
		
		 $errorFlag = false;
		 $error= "";
		 $errorMessage = "";
		 $searchtype="";
	if (!empty($_POST['search-submit']))
	{
		if($_POST['searchfirst']==NULL && $_POST['searchlast']==NULL && $_POST['searchapt']==NULL) //empty field error check
			{
				$error = "Error 37! You must fill in a field to search by!";
				$errorFlag= true;
			}
		//first name search
		if($_POST['searchfirst']!=NULL)
		{
			if(!eregi("[A-Z]+[a-z]*", $_POST['searchfirst']))
			{
				$error = "First name is invalid.<br/>";
				$errorFlag = true;
			}
			$first=$_POST['searchfirst'];
			$searchtype = "first";
		}
		//last name search
		elseif ($_POST['searchlast']!=NULL) 
		{
			if(!eregi("[A-Z]+[a-z]*", $_POST['searchlast']))
			{
				$error = "Last name is invalid.<br/>";
				$errorFlag = true;
			}
			$last=$_POST['searchlast'];
			$searchtype = "last";
		}
		//apartment number search
		elseif ($_POST['searchapt']!=NULL) 
		{
			if(!eregi("[1-3]{1}[0-9]{2}[A-B]?|1DC|9DC|14NC", $_POST['searchapt']))
			{
				$error = "Apartment number is invalid.<br/>";
				$errorFlag = true;
			}
			$apt=$_POST['searchapt'];
			$searchtype = "apartment";
		}
		if($errorFlag == false)
		{
			
				require("includes/config.inc.php");//get our variables from url
				//initial query
				if($searchtype == "first")
				{
				$query = "Select first_name,last_name,apt_num,phone_num,birthdate,dining FROM resident WHERE first_name = '$first'";
				$query_params = null;
				}
				elseif($searchtype == "last")
				{
				$query = "Select first_name,last_name,apt_num,phone_num,birthdate,dining FROM resident WHERE last_name = '$last'";
				$query_params = null;
				}
				elseif($searchtype == "apartment")
				{
				$query = "Select first_name,last_name,apt_num,phone_num,birthdate,dining FROM resident WHERE apt_num = '$apt'";
				$query_params = null;
				}
				//execute query
				try 
				{
				    $stmt   = $db->prepare($query);
				    $result = $stmt->execute($query_params);
				}
				catch (PDOException $ex) 
				{
				    $response["success"] = 0;
				    $response["message"] = "Database Error!";
				    die($response);
				}
				
				// Finally, we can retrieve all of the found rows into an array using fetchAll 
				$rows = $stmt->fetchAll();
				
				
				if ($rows) 
				{
				    $response["success"] = 1;
				    $response["message"] = "INCOMING RESIDENTS!";
				    $response["posts"]   = array();
					$residents = array();
				    
				    foreach ($rows as $row) 
				    {
				        $post             = array();
				        $post["first_name"] = $row["first_name"];
				        $post["last_name"]    = $row["last_name"];
				        $post["apt_num"]    = $row["apt_num"];
						$post["phone_num"]    = $row["phone_num"];
						$post["birthdate"]    = $row["birthdate"];
						$post["dining"]    = $row["dining"];
				        array_push($residents, $post);
					}
				}
				else {
				    $response["success"] = 0;
				    $response["message"] = "No Residents returned";
					}
			}
		}
	}
elseif(isset($_POST['add-submit']))
{
		 $errorFlag = false;
		 $error= "";
		 $errorMessage = "";
		 $searchtype="";
	if (!empty($_POST['add-submit']))
	{
		if($_POST['addfirst']==NULL || $_POST['addlast']==NULL || $_POST['addapt']==NULL || $_POST['addphone']==NULL || $_POST['adddin']==NULL) //empty field error check
			{
				$error = "Error 3007! You must fill in all fields to add a new resident!";
				$errorFlag= true;
			}
		if($_POST['addfirst']!=NULL)
		{
			if(!eregi("[A-Z]+[a-z]*", $_POST['addfirst']))
			{
				$error = "First name is invalid.<br/>";
				$errorFlag = true;
			}
			$first=$_POST['addfirst'];
			
		}
		if ($_POST['addlast']!=NULL) 
		{
			if(!eregi("[A-Z]+[a-z]*", $_POST['addlast']))
			{
				$error = "Last name is invalid.<br/>";
				$errorFlag = true;
			}
			$last=$_POST['addlast'];
		}
		if ($_POST['addapt']!=NULL) 
		{
			if(!eregi("[1-3]{1}[0-9]{2}[A-B]?|1DC|9DC|14NC", $_POST['addapt']))
			{
				$error = "Apartment number is invalid.<br/>";
				$errorFlag = true;
			}
			$apt=$_POST['addapt'];
		}
		if ($_POST['addphone']!=NULL) 
		{
			if(!eregi("[(]{1}[0-9]{3}[)]{1}[0-9]{3}[-]{1}[0-9]{4}", $_POST['addphone']))
			{
				$error = "Phone number is invalid.<br/>";
				$errorFlag = true;
			}
			$phone=$_POST['addphone'];
		}
		if ($_POST['adddin']!=NULL) 
		{
			if(!eregi("445|615|None|VC|CS", $_POST['adddin']))
			{
				$error = "Dinner Seating Invalid.<br/>";
				$errorFlag = true;
			}
			$dinner=$_POST['adddin'];
		}
		if($errorFlag == false)
		{
				$response["success"] = 1;
				require("includes/config.inc.php");//get our variables from url
				//initial query
				$query = "INSERT INTO `resident`(`first_name`, `last_name`, `apt_num`, `phone_num`, `dining`) VALUES ('$first','$last','$apt','$phone','$dinner')";
				$query_params = null;
				//execute query
				try 
				{
				    $stmt   = $db->prepare($query);
				    $result = $stmt->execute($query_params);
				}
				catch (PDOException $ex) 
				{
				    $response["success"] = 0;
				    $response["message"] = "Database Error!";
				}
		}
	}
}
elseif(isset($_POST['remove-submit']))
{
		 $errorFlag = false;
		 $error= "";
		 $errorMessage = "";
		 $searchtype="";
	if (!empty($_POST['remove-submit']))
	{
		if($_POST['removefirst']==NULL || $_POST['reomvelast']==NULL || $_POST['removeapt']==NULL) //empty field error check
			{
				$error = "Error 9999! You must fill in all fields to remove a resident!";
				$errorFlag= true;
			}
		if($_POST['removefirst']!=NULL)
		{
			if(!eregi("[A-Z]+[a-z]*", $_POST['removefirst']))
			{
				$error = "First name is invalid.<br/>";
				$errorFlag = true;
			}
			$first=$_POST['removefirst'];
			
		}
		if ($_POST['removelast']!=NULL) 
		{
			if(!eregi("[A-Z]+[a-z]*", $_POST['removelast']))
			{
				$error = "Last name is invalid.<br/>";
				$errorFlag = true;
			}
			$last=$_POST['removelast'];
		}
		if ($_POST['removeapt']!=NULL) 
		{
			if(!eregi("[1-3]{1}[0-9]{2}[A-B]?|1DC|9DC|14NC", $_POST['removeapt']))
			{
				$error = "Apartment number is invalid.<br/>";
				$errorFlag = true;
			}
			$apt=$_POST['removeapt'];
		}
		if($errorFlag == false)
		{
				$response["success"] = 1;
				require("includes/config.inc.php");//get our variables from url
				//initial query
				$query = "DELETE FROM `resident` WHERE `first_name` = '$first' AND `last_name` = '$last' AND `apt_num` = '$apt'";
				$query_params = null;
				//execute query
				try 
				{
				    $stmt   = $db->prepare($query);
				    $result = $stmt->execute($query_params);
				}
				catch (PDOException $ex) 
				{
				    $response["success"] = 0;
				    $response["message"] = "Database Error!";
				}
		}
	}
}
?>
<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>VInCS</title>

  
  <link rel="stylesheet" href="styles/foundation.css">
  

  <script src="js/vendor/custom.modernizr.js"></script>

</head>

	<body>
<?php $cur_page = "home"; ?>
<?php include "includes/nav.php" ?>
<?php include "includes/header.php" ?>
 
<h1 class="confidential">*FOR INTERNAL DEVELOPMENT PURPOSES ONLY*</h1>
<?php 
if(isset($_POST['search-submit']))
{
	if($errorFlag==true){
		echo $error;
	}
	elseif($response["success"]==0)
	{
		echo $response["message"];
	}
	elseif($response["success"]==1)
	{
		print_r($residents);
	}
}
elseif(isset($_POST['add-submit']))
{
	if($errorFlag==true){
		echo $error;
	}
	elseif($response["success"]==1)
	{
		echo "Resident Successfully Entered into the Database!";
	}
	else
	{
		echo $response["message"];
	}
}
elseif(isset($_POST['remove-submit']))
{
	if($errorFlag==true){
		echo $error;
	}
	elseif($response["success"]==1)
	{
		echo "Resident Successfully deleted from the Database!";
	}
	else
	{
		echo $response["message"];
	}
}
?>
<div class="section-container vertical-tabs" data-section="vertical-tabs">
  <section class="active">
  	<p class="title" data-section-title><a href="#">Search for Resident</a></p>
    <div class="content" data-section-content>
    	<h3>Search for a Resident</h3>
	<p>
		<form action="" id="ressearch" method="post">
  		<fieldset>
    	<legend>Resident Search Query</legend>
    	<div class="row">
      		<div class="large-4 columns">
       		<label>First Name</label>
        	<input type="text" placeholder="resident first name" title="searchfirst" id="searchfirst" name="searchfirst">
      		</div>
     	</div>
     	<div class="row">
      		<div class="large-4 columns">
       		<label>Last Name</label>
        	<input type="text" placeholder="resident last name" title="searchlast" id="searchlast" name="searchlast">
      		</div>
     	</div>
     	<div class="row">
      		<div class="large-4 columns">
       		<label>Apartment</label>
        	<input type="text" placeholder="resident apartment" title="searchapt" id="searchapt" name="searchapt">
      		</div>
     	</div>
     	<div class="row">
        <input type="submit" name="search-submit" id="search-submit" value="Submit" class="small button success"/>
       </div>
       </fieldset>
       </form>
	</p>
		
    </div>
  </section>
  <section>
    <p class="title" data-section-title><a href="#">Add a Resident</a></p>
    <div class="content" data-section-content>
      <h3>Add a Resident</h3>
	<p>
		<p>
		<form action="" id="resadd" method="post">
  		<fieldset>
    	<legend>Resident Database Entry</legend>
    	<div class="row">
      		<div class="large-4 columns">
       		<label>First Name</label>
        	<input type="text" placeholder="resident first name" title="addfirst" id="addfirst" name="addfirst">
      		</div>
      		<div class="large-4 columns">
       		<label>Last Name</label>
        	<input type="text" placeholder="resident last name" title="addlast" id="addlast" name="addlast">
      		</div>
      		<div class="large-4 columns"></div>
      	</div>
     	<div class="row">
      		<div class="large-4 columns">
       		<label>Apartment</label>
        	<input type="text" placeholder="resident apartment" title="addapt" id="addapt" name="addapt">
      		</div>
      		<div class="large-4 columns">
       		<label>Phone Number</label>
        	<input type="text" placeholder="resident Phone Number" title="addphone" id="addphone" name="addphone">
      		</div>
      		<div class="large-4 columns">
       		<label>Dining</label>
        	<input type="text" placeholder="resident Dinner seating" title="adddin" id="adddin" name="adddin">
      		</div>
     	</div>
     	<div class="row">
        <input type="submit" name="add-submit" id="add-submit" value="Submit" class="small button success"/>
       </div>
       </fieldset>
       </form>
	</p>	
	</p>
	    </div>
  </section>
  <section>
    <p class="title" data-section-title><a href="#">Remove a Resident</a></p>
    <div class="content" data-section-content>
     <h3>Remove a Resident</h3>
	<p>
		<form action="" id="ressearch" method="post">
  		<fieldset>
    	<legend>Resident Delete Function</legend>
    	<div class="row">
      		<div class="large-4 columns">
       		<label>First Name</label>
        	<input type="text" placeholder="resident first name" title="removefirst" id="removefirst" name="removefirst">
      		</div>
     	</div>
     	<div class="row">
      		<div class="large-4 columns">
       		<label>Last Name</label>
        	<input type="text" placeholder="resident last name" title="removelast" id="removelast" name="removelast">
      		</div>
     	</div>
     	<div class="row">
      		<div class="large-4 columns">
       		<label>Apartment</label>
        	<input type="text" placeholder="resident apartment" title="removeapt" id="removeapt" name="removeapt">
      		</div>
     	</div>
     	<div class="row">
        <input type="submit" name="remove-submit" id="remove-submit" value="Submit" class="small button success"/>
       </div>
       </fieldset>
       </form>
	</p>
    </div>`
  </section>
</div>

<?php include "includes/footer.php" ?>

<script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>');
  </script>
  
  <script src="js/foundation.min.js"></script>
  <!--
  
  <script src="js/foundation/foundation.js"></script>
  
  <script src="js/foundation/foundation.alerts.js"></script>
  
  <script src="js/foundation/foundation.clearing.js"></script>
  
  <script src="js/foundation/foundation.cookie.js"></script>
  
  <script src="js/foundation/foundation.dropdown.js"></script>
  
  <script src="js/foundation/foundation.forms.js"></script>
  
  <script src="js/foundation/foundation.joyride.js"></script>
  
  <script src="js/foundation/foundation.magellan.js"></script>
  
  <script src="js/foundation/foundation.orbit.js"></script>
  
  <script src="js/foundation/foundation.reveal.js"></script>
  
  <script src="js/foundation/foundation.section.js"></script>
  
  <script src="js/foundation/foundation.tooltips.js"></script>
  
  <script src="js/foundation/foundation.topbar.js"></script>
  
  <script src="js/foundation/foundation.interchange.js"></script>
  
  <script src="js/foundation/foundation.placeholder.js"></script>
  
  <script src="js/foundation/foundation.abide.js"></script>
  
  -->
  
  <script>
    $(document).foundation();
  </script>
</body>
</html>
