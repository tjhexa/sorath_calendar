<!DOCTYPE HTML>

<html>

<head>
    <title>Edit User</title>

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/my-login.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <style>

    </style>
</head>

<body class="my-login-page">


<?php

include "headerbar.php";

?>

    <?php
    require_once('./utils/auth.php');
    include "database.php";
    include "restricted.php";



    if (isset($_COOKIE['is_admin'])) {

        $is_admin = $_COOKIE['is_admin'];
        if ($is_admin == 0) {
            echo "Unauthorized access! Please contact administrator.";
            exit;
        }
    }



    //echo $_GET['id'];
    

    if (isset($_GET['id'])) {

        $id_passed = intval($_GET['id']);

        if ($id_passed > 0) {

            $sql = "SELECT id,name,email,password,phone,is_admin,can_edit,can_add,is_deleted FROM users WHERE id='$id_passed'";
            $result = mysqli_query($link, $sql);

            if (mysqli_num_rows($result) == 0) {             
                $failed = 1;
                echo "Invalid Values";
                exit;
            }
            else {                
                $row = $result->fetch_row();

                //echo $row[1];

                $user_id = $row[0];
                $user_name = $row[1];
                $user_email = $row[2];
                $user_password = $row[3];
                $user_phone = $row[4];
                $user_is_admin = $row[5];
                $user_can_edit = $row[6];
                $user_can_add = $row[7];
                $user_is_deleted = $row[8];
               






            }


        }




    }



    if (isset($_POST['op'])) {

        $op = $_POST['op'];
        $id = $_POST['id'];
       

        if (isset($_POST['delete']) && isset($_POST['id'])) {

            //$id = $_POST['id'];
                    
            $sql = "UPDATE users set is_deleted=1 WHERE id = $id"; 
        
            $prepareQuery = $auth->prepare($sql);
        
            if ($prepareQuery == false) {
                print_r($auth->errorInfo());
                die('Error preparing the query.');
            }
        
            $executeQuery = $prepareQuery->execute();
            if ($executeQuery == false) {
                print_r($prepareQuery->errorInfo());
                die('Error executing the query.');
            }
            header("Location: listusers.php");
            exit();
        }
        else
        if ($op == "save") {


            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $pass = $_POST['pass1'];
            $date_added = gmdate('Y-m-d h:i:s \G\M\T', time());
            $is_admin = false;
            $is_deleted = false;
            $can_edit = $_POST['can_edit'];
            $can_add = $_POST['can_add'];
            $sql = "UPDATE users SET name='$name',email='$email', phone='$phone', can_edit='$can_edit', can_add ='$can_add' where id=$id";

            if(isset($_POST['pass1']) && !empty($_POST['pass1'])){
                $sql = "UPDATE users SET name='$name', password =PASSWORD('$pass'),email='$email', phone='$phone', can_edit='$can_edit', can_add ='$can_add' where id=$id";
            }
        

            if (mysqli_connect_errno()) {
                echo ("Connect failed: %s " + mysqli_connect_error());
                exit();
            }

            if (!mysqli_query($link, $sql)) {
                echo ("Error message: %s " + mysqli_error($link));
            } else {
                ?>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Well done!</h4>
                    <p>Update Successfull.</p>
                    <hr>
                    <p class="mb-0">The user details has been updated!</p>
                </div>

                <script type='text/javascript'>
                    $(document).ready(function () {
                        $('#myModal').modal('show');
                    });
                </script>





                <?php
            }

            /* close connection */
            mysqli_close($link);




        }
    }

    ?>
    
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">User Updated.</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        onclick="javascript:window.location.href='listusers.php';" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>User details has been updated.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success"
                        onclick="javascript:window.location.href='listusers.php';">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <img src="img/sorath_logo.png" alt="logo">
                    </div>

                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Edit User</h4>
                            <form method="POST" class="my-login-validation" novalidate="" action=edituser.php>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" 
                                    value="<?php echo (isset($user_name)) ? htmlspecialchars($user_name):''; ?>" required
                                        autofocus>
                                    <div class="invalid-feedback">
                                        Name is invalid
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" 
                                    value="<?php echo (isset($user_email))?"$user_email":""; ?>" required
                                        autofocus>
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input id="phone" type="text" class="form-control" name="phone" 
                                    value="<?php echo (isset($user_phone))?"$user_phone":""; ?>" required
                                        autofocus>
                                    <div class="invalid-feedback">
                                        Phone is invalid
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="password">Password

                                    </label>
                                    <input id="pass1" type="password" class="form-control" name="pass1" 
                                       placeholder="(Set new password here if required)"  data-eye onChange="form.pass2.pattern=this.value">
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Confirm Password

                                    </label>
                                    <input id="pass2" type="password" class="form-control" name="pass2" 
                                        data-eye   placeholder="(Set new password here if required)">
                                    <div class="invalid-feedback">
                                        Confirm Password is required & it should match with password.
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="can_add">Can Add Events?</label>
                                    <div class="col-9">
                                        <div class="form-check form-check-inline">
                                            <label><input name="can_add" id="can_add_0" type="radio"
                                                    class="form-check-input" value="1" 
                                                    <?php 
                                                    
                                                    echo 
                                                    ((isset($user_can_add)                                                     
                                                    && $user_can_add==1) 
                                                    ||
                                                    (isset($user_is_admin)                                                     
                                                    && $user_is_admin==1))
                                                    ?
                                                    "checked"
                                                    :""; ?>  
                                                    aria-describedby="can_add_dataHelpBlock">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label><input name="can_add" id="can_add_1" type="radio"
                                                    class="form-check-input" value="0" 
                                                    <?php  echo (isset($user_can_add) && $user_can_add==0 && $user_is_admin!=1)?"checked":""; ?>
                                                    aria-describedby="can_add_dataHelpBlock">No</label>
                                        </div>
                                        <!-- <span id="can_add_dataHelpBlock" class="form-text text-muted">Please Select
                                            Add Rights</span> -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="can_edit">Can Edit Events?</label>
                                    <div class="col-9">
                                        <div class="form-check form-check-inline">
                                            <label><input name="can_edit" id="can_edit_0" type="radio" 
                                                    class="form-check-input" value="1"
                                                    <?php    echo 
                                                    ((isset($user_can_edit)                                                     
                                                    && $user_can_edit==1) ||
                                                    (isset($user_is_admin)                                                     
                                                    && $user_is_admin==1))
                                                    ?
                                                    "checked"
                                                    :""; ?>
                                                    aria-describedby="can_edit_dataHelpBlock">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label><input name="can_edit" id="can_edit_1" type="radio"
                                                    class="form-check-input" value="0" 
                                                    <?php  echo (isset($user_can_edit) && $user_can_edit==0 && $user_is_admin!=1)?"checked":""; ?>

                                                    aria-describedby="can_edit_dataHelpBlock">No</label>
                                        </div>
                                        <!-- <span id="can_edit_dataHelpBlock" class="form-text text-muted">Please Select
                                            Edit Rights</span> -->
                                    </div>
                                </div>



                                <div class="form-group m-0">
                                    <input for="id" type="hidden" value="<?php echo $user_id ?>" name="id" id="id">
                                    <button type="submit" value="Save data" class="btn btn-primary btn-block">
                                        Update User
                                    </button>
                                    <button id="userdelete" type="button" name="userdelete" value="userdelete" class="btn btn-danger btn-block">
                                        Delete User
                                    </button>
                                </div>
                                <input type="hidden" name="op" value="save" />

                            </form>
                        </div>
                    </div>
                    <div class="footer">
                        Copyright &copy; 2023 &mdash; Sorath Resorts
                    </div>
                </div>
            </div>
        </div>
        <div id="myModalUserDeleteConfirm" class="modal fade">
			<form class="form-horizontal" method="POST" action="edituser.php">
				<input type="hidden" name="id" class="form-control" id="id">
				
				<input type="hidden" type="text" for="date_modified" value="2023-01-28 00:00:00" id="date_modified"
					name="date_modified" />
				<input type="hidden" type="text" for="modified_by" value="<?php echo $username_loggedin ?>"
					id="modified_by" name="modified_by" />
				<input class="nocheckbox" type="hidden" value="true" id="dlt" checked name="delete">
                <input type="hidden" name="op" value="delete" />
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content border-0">
						<div class="modal-body p-0">
							<div class="card border-0 p-sm-3 p-2 justify-content-center">
								<div class="card-header pb-0 bg-white border-0 ">
									<div class="row">
										<div class="col ml-auto"><button type="button" class="close"
												data-dismiss="modal" aria-label="Close"> <span
													aria-hidden="true">&times;</span> </button></div>
									</div>
									<p class="font-weight-bold mb-2"> Are you sure you want to delete this user?</p>
									<p class="text-muted "> This user entry and all related information will be deleted
										right away. (Events added by this user will not be deleted.) </p>
								</div>
								<div class="card-body px-sm-4 mb-2 pt-1 pb-0">
									<div class="row justify-content-end no-gutters">
										<div class="col-auto"><button type="button" class="btn btn-light text-muted"
												data-dismiss="modal">Cancel</button></div>
										<div class="col-auto"><button type="submit" 
												class="btn btn-danger px-4">Delete</button></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="js/my-login.js"></script>
<script>
    $('#userdelete').on("click", function () {
			// do something

			$('#myModalUserDeleteConfirm #id').val(<?=$user_id?>);

			$('#myModalUserDeleteConfirm').modal('show');
		});

</script>
<script src="js/sitewide.js"></script>
</body>

</html>