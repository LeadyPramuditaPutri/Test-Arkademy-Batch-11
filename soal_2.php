<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript" src="jquery.validate.js"></script>
<script type="text/javascript" >
$(document).ready(function() {
$.validator.addMethod("email", function(value, element) 
{ 
return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value); 
}, "Please enter a valid email address.");

$.validator.addMethod("handphone", function(value, element) 
{ 
return this.optional(element) || /^[+62]{8,15}$/i.test(value); 
}, "Please enter a valid no handphone address.");

$.validator.addMethod("username",function(value,element)
{
return this.optional(element) || /^[a-zA-Z0-9._-]{5,9}$/i.test(value); 
},"Username are 3-15 characters");

$.validator.addMethod("password",function(value,element)
{
return this.optional(element) || /^[A-Za-z0-9!@#$%^&*()_]{8}$/i.test(value); 
},"Passwords are 6-16 characters");

// Validate signup form
$("#signup").validate({
rules: {
email: "required email",
handphone: "required handphone",
username: "required username",
password: "required password",
},
});
});
</script>