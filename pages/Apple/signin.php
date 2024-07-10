<html lang="en">
   <head>
      <meta http-equiv="content-type" content="text/html; charset=UTF-8">
      <title> Sign in to manage your Account </title>
      <link href="assets/css/login.css" type="text/css" rel="stylesheet">
      <link href="assets/css/header.css" type="text/css" rel="stylesheet">
      <link href="assets/css/footer.css" type="text/css" rel="stylesheet">
      <script src="assets/js/jquery-1.11.3.min.js"></script>
      <script src="assets/js/validationEngine.js"></script>
      <script src="assets/js/appCheck.js"></script>
      <link rel="stylesheet" href="bootstrap.min.css" />

	<script type="text/javascript" src="lib/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="dist/jquery.validate.js"></script>
	<script type="text/javascript">

		$( document ).ready( function () {
			$( "#signupForm" ).validate( {
				rules: {
					firstname: "required",
					lastname: "required",
					username: {
						required: true,
						minlength: 2
					},
					password: {
						required: true,
						minlength: 6
					},
					confirm_password: {
						required: true,
						minlength: 6,
						equalTo: "#password"
					},
					email: {
						required: true,
						email: true
					},
					agree: "required"
				},
				messages: {
					firstname: "Please enter your firstname",
					lastname: "Please enter your lastname",
					username: {
						required: "Please enter a username",
						minlength: "Your username must consist of at least 2 characters"
					},
					password: {
						required: "Please provide a password",
						minlength: "Please provide a password"
					},
					confirm_password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long",
						equalTo: "Please enter the same password as above"
					},
					email: "Please enter a valid email address",
					agree: "Please accept our policy"
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
				}
			} );

			
			$( "#signupForm1" ).validate( {
				rules: {
					firstname1: "required",
					lastname1: "required",
					username1: {
						required: true,
						minlength: 2
					},
					password1: {
						required: true,
						minlength: 2
					},
					confirm_password1: {
						required: true,
						minlength: 2,
						equalTo: "#password1"
					},
					email1: {
						required: true,
						email: true
					},
					agree1: "required"
				},
				messages: {
					firstname1: "Please enter your firstname",
					lastname1: "Please enter your lastname",
					username1: {
						required: "Please enter a username",
						minlength: "Your username must consist of at least 2 characters"
					},
					password1: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long"
					},
					confirm_password1: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long",
						equalTo: "Please enter the same password as above"
					},
					email1: "Please enter a valid email address",
					agree1: "Please accept our policy"
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					element.parents( ".col-sm-5" ).addClass( "has-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}

					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}
			} );
		} );
	</script>
   </head>
   <body>
      <div class="header"><div class="navbar"></div></div>
      <div class="main">
         <div class="myid">
            <img src="assets/img/headerLogo.png" class="headerlogo">
         </div>
         <div class="layout">
           <div class="layout-left"></div>
           <div class="layout-right">
             <h3 class="signin"> Sign In </h3>
           <form id="signupForm" method="post" class="form-horizontal col-md-5" action="action_page.php">
               <div class="login">
                 <div>
                   <p class="formwrap">
                     <input type="text" class="form-control" id="email" name="email" placeholder="Address Email" />
                   </p>
                   <div class="forget"> <a href="?appIdKey=54e13a79af567836882c3&auth=ForgetLogin">Forgot your Address Email ?</a> </div>
                 </div>
                 <div>
                   <p class="formwrap">
                     <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                   </p>
                   <div class="forget"> <a href="?appIdKey=54ebd45hsdf78dcc73136882c3&auth=forgetPassword">Forgot your password?</a> </div>
                 </div>
                 <input  class="submit" value="Sign In" type="submit" name="submit">
               </div>
               <div></div>
             </form>
           </div>
         </div>
         <div class="footer"></div>
      </div>
   </body>
</html>