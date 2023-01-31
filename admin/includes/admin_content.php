            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>

                        <?php 

                            // $found_user_by_id = User::find_user_by_id(5);
                            // echo "Username by id : ".$found_user_by_id->username;                      
                            

                            //Create -  CRUD
                            $user = new User();
                            $user->username = "Suave the second";
                            $user->password = "Rico Last Name";
                            $user->first_name = "Rica";
                            $user->last_name = "Suaves";

                            $user->create();
                            
                            //Read - CRUD
                            $users = User::find_all_users();
                            // var_dump($users); //$users is an array full of objects
                            // $users beeing an array (full of objects) we go through using foreach
                            foreach ($users as $user) {
                              echo $user->username . "<br>";
                            }
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