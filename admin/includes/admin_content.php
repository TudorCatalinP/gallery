            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>

                        <?php 

                            // $found_user_by_id = User::find_user_by_id(3);
                            // echo "Username by id : ".$found_user_by_id->username;     
                            // $found_user_by_id->properties();  
                            
                            // $user = new User();
                            //Create -  CRUD
                            
                            // $user->username = "Totalital";
                            // $user->password = "Secret_password";
                            // $user->first_name = "TOLITA";
                            // $user->last_name = "APELLIDO";
                            // $user->create();
                            
                            //Update - CRUD
                            $user = User::find_user_by_id(23);
                            $user->first_name = "first_name_5000";
                            $user->last_name = "last_name_5000";
                            $user->username= "username_5000";
                            $user->password= "password_5000";
                            $user->update();

                            //Delete - CRUD
                            // $user->id = "16";
                            // $user = User::find_user_by_id(17);
                            // $user->delete();

                            //$user = User::find_user_by_id(6);
                            // $user->username = "Whatever_4000";
                            // $user->save();





                            //Read - CRUD
                            // $users = User::find_all_users();
                            // foreach ($users as $user) {
                            //   echo $user->username . "<br>";
                            // }



                        ?>

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->