
    <!-- jQuery -->
    <script type="text/javascript" src="vendor/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>
    
     <!-- Page Plugins -->
    <script type="text/javascript" src="assets/js/pages/login/EasePack.min.js"></script>
    <script type="text/javascript" src="assets/js/pages/login/rAF.js"></script>
    <script type="text/javascript" src="assets/js/pages/login/TweenLite.min.js"></script>
    <script type="text/javascript" src="assets/js/pages/login/login.js"></script>
	
    <!-- Validation Plugins -->
    <script type="text/javascript" src="assets/admin-tools/admin-forms/js/advanced/steps/jquery.steps.js"></script>
    <script type="text/javascript" src="assets/admin-tools/admin-forms/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="assets/admin-tools/admin-forms/js/additional-methods.min.js"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="assets/js/utility/utility.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
    <script type="text/javascript" src="assets/js/demo.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

			// Init Theme Core      
			Core.init({
				sbm: "sb-l-c",
			});

			// Init Demo JS
			Demo.init();
			
			 // Init CanvasBG and pass target starting location
			CanvasBG.init({
				Loc: {
					x: window.innerWidth / 2,
					y: window.innerHeight / 3.3
				},
			});
         
			
			/* @custom validation method (smartCaptcha) 
            ------------------------------------------------------------------ */
                
            $.validator.methods.smartCaptcha = function(value, element, param) {
                    return value == param;
            };
                    
            $( "#admin-form" ).validate({
            
                    /* @validation states + elements 
                    ------------------------------------------- */
                    
                    errorClass: "state-error",
                    validClass: "state-success",
                    errorElement: "em",
                    
                    /* @validation rules 
                    ------------------------------------------ */
                        
                    rules: {
                            username: {
                                    required: true
                            },
                                                                    
                            password:{
                                    required: true,
                                    minlength: 6,
                                    maxlength: 16                       
                            }
                    },
                    
                    /* @validation error messages 
                    ---------------------------------------------- */
                        
                    messages:{
                            firstname: {
                                    required: 'Enter username'
                            },
                                                                                                          
                            password:{
                                    required: 'Please enter a password'
                            }
                    },

                    /* @validation highlighting + error placement  
                    ---------------------------------------------------- */ 
                    
                    highlight: function(element, errorClass, validClass) {
                            $(element).closest('.field').addClass(errorClass).removeClass(validClass);
                    },
                    unhighlight: function(element, errorClass, validClass) {
                            $(element).closest('.field').removeClass(errorClass).addClass(validClass);
                    },
                    errorPlacement: function(error, element) {
                       if (element.is(":radio") || element.is(":checkbox")) {
                                element.closest('.option-group').after(error);
                       } else {
                                error.insertAfter(element.parent());
                       }
                    }
                            
            }); 

        });
		
		
			
    </script>

    <!-- END: PAGE SCRIPTS -->

</body>

</html>