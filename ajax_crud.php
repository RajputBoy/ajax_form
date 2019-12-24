<?php
$con2=mysqli_connect("localhost","root","");
mysqli_select_db($con2,"project2");
//check database connection
if(mysqli_connect_error()){
	echo "failed to connect Mysql:".mysqli_connect_error();
}
include "header.php";
?>
<div class="container">
	<h2 class="text-center">Add Employee</h2>
	<h3 id="add_form_data" style="display: none;color:green;">Form Data Added Successfully</h3>
	<hr>
	<div class="row centered-form">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">
					</div>
					<div class="panel-body">
					<form class="signup_form" action="submit_data.php" method="post"  enctype="multipart/form-data" id="addlist_form" name="project_registration_form">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
								    <label>Employee Name<em style="color:red">*</em></label>
								    <input type="text" name="emp_name" class="form-control" autocomplete="off" required>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
								    <label>Employee Address<em style="color:red">*</em></label>
								    <input type="text" name="emp_address" class="form-control" autocomplete="off" required>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
								    <label>Employee Mobile<em style="color:red">*</em></label>
								    <input type="text" name="emp_mobile" class="form-control" autocomplete="off" required>
								</div>
							</div>
						</div>
						<button class="btn btn-primary btn-lg" name="submit"  value="Save" id="save-btn">Update</button>
					</form>
				</div>
				<br>
			</div>
		</div>
	</div>
	<table id="" class="display table lisiting-table">
        <thead>
			<tr>
				<th width="10%">Id</th>
				<th width="20%">Employee Name</th>
				<th width="40%">Address</th>
				<th width="20%">Mobile</th>
				<th width="10%">Action</th>
			</tr>
			</thead>
			<tbody id="data_table">
			<?php
			$query="select * from wp_employee order by id desc";
		    //$query="SELECT count(*) as paging FROM registration_table ";
		    $result=mysqli_query($con2,$query);
	        while($get=mysqli_fetch_assoc($result)){
			?>
			<tr>
				<td><?php echo $get['id']; ?></td>
				<td><?php echo $get['emp_name']; ?></td>
				<td><?php echo $get['emp_address']; ?></td>
				<td><?php echo $get['emp_mobile']; ?></td>
				<td>
				<a name="View_list" href="edit_employee.php?id=<?php echo $get['id'];?>" value="View" class="btn btn-primary">Edit</a></td>
			</tr>
		    <?php
		    }
			?>
		</tbody>
	</table>
</div>
</body>
<script type="text/javascript">
	$("#addlist_form").submit(function(e) {

    console.log("hiii");

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');

    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
           	$("#add_form_data").css("display","block");
           	$("#data_table").empty();
           	$("#data_table").append(data);
            // show response from the php script.
           }
         });


});
</script>
</html>