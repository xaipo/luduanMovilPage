<?php

	


$action=$_REQUEST['action'];

if ($action=="")    /* display the contact form */

    {

    ?>

<style>
body{
background-color: #404141
	
}
</style>
<body>
    <form  action="" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="action" value="submit">

    <label style="color:white;">Nombre:</label><br>

    <input name="name" type="text" value="" size="100%"/><br>

    <label style="color:white;">Email:</label><br>

    <input name="email" type="text" value="" size="100%"/><br>

    <label style="color:white;">Mensaje:</label><br>

    <textarea name="message" rows="7" cols="100%" size="100%"></textarea><br>

    <input type="submit" value="Enviar e-mail" size="100%"/>

    </form>
</body>
    <?php

    } 

else                /* send the submitted data */

    {

    $name=$_REQUEST['name'];

    $email=$_REQUEST['email'];

    $message=$_REQUEST['message'];

    if (($name=="")||($email=="")||($message==""))

        {

		echo "All fields are required, please fill <a href=\"\">the form</a> again.";

	    }

    else{		

	    $from="From: $name<$email>\r\nReturn-path: $email";

        $subject="Message sent using your contact form";

		echo($from);
		mail("info@luduanseeker.com.ec", $subject, $message, $email);

		echo( '
<style>
body{
background-color: #404141
	
}
</style>
<body>
<br>
<div style="background-color: #404141">
	<h1 style="text-align: center; color:white;">Su mensaje ha sido enviado nos contactaremos pronto contigo gracias </h1>
	<h1 style="text-align: center; color:white;">Click en la imagen para regresar </h1>


	<a href="/indexMovil.html"><center><img src="/imagesPage/Logo.svg" style="text-align: center; width: 20%; height: 20%"/></center></a>
</div>
</body>' );
	    }

    }  

?>

