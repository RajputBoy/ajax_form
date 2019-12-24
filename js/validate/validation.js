//validation on register page
$(function(){
 $("#addlist_form").validate({
 //rules of required field
 rules:{
      
  email:{
	  required:true,
      email:true
  },
  phone:{
		required: true,
		phone:true,
		minlength: 10
		},
 },
 
//error message of name

messages: {
 Pname: "Please enter your Program name",
 Pcode: "Please enter your Project code",
 project: "Please enter your Project ",
 Office: "Please enter the value ",
 remark: "Please enter your Remark ",
 //phone: "Please enter your valid Phone number ",
 email:{ 
	required:"Please enter a valid email address",
     },
 phone:{
        required: "Please enter your phone number"
       }
    }
   });
});