            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>

                        <?php 

                           // $result_set = User::find_all_users(); 
                           // var_dump($result_set);

                           // while($row = mysqli_fetch_array($result_set)){
                           //      echo "<br><b>".$row['id']."</b><br>";
                           // }

                          $found_user_by_id = User::find_user_by_id(5);
                          echo "Username by id : ".$found_user_by_id->username;
                          // echo "<hr><hr>";

                           // $found_user = User::find_user_by_id("2"); 
                           // //var_dump($found_user); //returns ann array

                           //  $user = User::instantiaton($found_user );
                           //  echo $user->username;
                           //  echo $user->id;

                           
                            $users = User::find_all_users();
                            //var_dump($users); //$users is an array full of objects
                            ////$users beeing an array (full of objects) we go through using foreach
                            // foreach ($users as $user) {
                            //   echo $user->username . "<br>";
                            // }

                            echo "<hr><hr>";

                            // $car = new Car();
                            // $car->run();//so thanks to the autoloader spl_autoload_register we can use the class even though we did not include the file that contains it 
                            
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