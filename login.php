
<?php include 'inc/header.php';?>

<?php

    if(($_SERVER["REQUEST_METHOD"]) == "POST" && isset($_POST['signup'])){

        $regData = $reg->registration($_POST);
    }
    if(($_SERVER["REQUEST_METHOD"]) == "POST" && isset($_POST['signIn'])){

    $loginData = $reg->login($_POST);

    }


if (session::get('login') == true) {
    header("location:index.php");
}


?>

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
             <p><?php


                 if(isset($loginData)){
                     echo $loginData;
                 }


                 ?></p>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post" id="member">
                	<input name="email" type="email" placeholder="email">
                    <input name="pass" type="password" placeholder="Password">

                 <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    <div class="buttons"><div><button name="signIn" class="grey">Sign In</button></div></div>
                    </div>

        </form>
    	<div class="register_account">
    		<h3>Register New Account</h3>
            <p><?php


                if(isset($regData)){
                    echo $regData;
                }


                ?></p>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Name" >
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="City" >
							</div>
							
							<div>
								<input type="text" name="zip" placeholder="Zip-Code">
							</div>
							<div>
								<input type="text" name="email" placeholder="E-Mail">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Address">
						</div>
		    		<div>
						<select id="country" name="country">
							<option value="">Select a Country</option>
							<option value="AF">Afghanistan</option>
							<option value="AL">Albania</option>
							<option value="DZ">Algeria</option>
							<option value="AR">Argentina</option>
							<option value="AM">Armenia</option>
							<option value="AW">Aruba</option>
							<option value="AU">Australia</option>
							<option value="AT">Austria</option>
							<option value="AZ">Azerbaijan</option>
							<option value="BS">Bahamas</option>
							<option value="BH">Bahrain</option>
							<option value="BD">Bangladesh</option>

		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Phone">
		          </div>
				  
				  <div>
					<input type="text" name="pass" placeholder="Password">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button name="signup" class="grey">Create Account</button></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php include 'inc/footer.php';?>
