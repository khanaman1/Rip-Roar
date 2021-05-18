<?php include 'header.php'; 
    if(isset($_SESSION['user'])) {


        $user_info = $crud->fetch_data_with_id('users', 'user_id', $_SESSION['user']);
        $bookings = $crud->fetch_all_table_data('booking');
        if($msg != null) {
            ?>
                <div class="registerSuccess mt-20"><?php echo $msg; ?></div>
            <?php
            $msg = null;
        }


    ?>
    
    <section class="profileContainer" >

        <div class="profile-container">
            <div class="profile-display mt-20 mb-20">
                    <div class="wrapper">
                <div class="left">
                    <img src="assets/BUNGY-COOL-GUY-copyright-The-Last-Resort-2.jpg" alt="user" width="100">
                    <h5><?php echo strtoupper($user_info['name']); ?></h5>
                    <!-- <p>Customer</p> -->
                </div>
                <div class="right">
                    <div class="info">
                        <h3>Information</h3>
                        <div class="info_data">
                            <div class="data">
                                <h4>Email</h4>
                                <p><?php echo strtolower($user_info['email']); ?></p>
                            </div>
                            <div class="data">
                            <h4>AGE</h4>
                                <p><?php echo $user_info['age']; ?></p>
                        </div>
                        </div>
                    </div>
                    
                    <div class="projects">
                            <h3>STATUS</h3>
                            <div class="projects_data">
                                <div class="data">
                                    <h4>Account Type</h4>
                                    <p><?php 
                                        if($user_info['role'] == 3)
                                        {
                                            echo "ADMIN";
                                        }
                                        else{
                                            echo "USER";
                                        }
                                    ?></p>
                                </div>
                                <div class="data">
                                <h4>Total Bookings</h4>
                                    <p><?php echo count($bookings);?></p>
                            </div>
                            </div>
                        </div>
                    
                        <div class="social_media">
                            <?php 
                                if($user_info['status']) {
                                    ?>
                                        <i class="fas fa-user-check"></i> <span>Active</span>
                                    <?php
                                }
                                else {
                                    ?>
                                    <a href="profile.php?get_verification=1">Deactive</a>
                                    <?php
                                }
                            ?>


                        </div>
                        </div>
                        </div>
                        </div>

                <div class="profile-edit mt-20 mb-20">

                    <div class="wrapper">
                <div class="right">
                    <div class="info">
                        <h3>EDIT INFO</h3>
                        <form method="POST" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' enctype="multipart/form-data">
                        <input type='text' name="name"  value="<?php echo $user_info['name'];?>" placeholder="Full Name"/>
                        <input type='text' name="username"  value="<?php echo $user_info['username'];?>" placeholder="Username"/>
                        <input type='password' name="pass1"  value="<?php echo (isset($_POST['pass1'])) ? $_POST['pass1']: '';?>" placeholder="PASSWORD"/>
                        <input type='password' name="pass2"  value="<?php echo (isset($_POST['pass2'])) ? $_POST['pass2']: '';?>" placeholder="COMFIRM PASSWORD"/>
                        <div>
                            <label>Your Age:</label>
                            <input type='number' class="age" name="age"  value="<?php echo $user_info['age'];?>" placeholder="AGE"/>
                        </div>


                        <button type="submit" name="user_edit">EDIT INFO</button><br>
                    </form>
                    

                    </div>
                </div>
                </div>

                
                </div>
        </div>

        <div class="profileBookingDetails">
            
            <h3>BOOKING HISTORY</h3>
            <table rules=none   >
            <tr>
                <th>S.N.</th>
                <th>Sport Name</th>
                <th>No. Of Slots</th>
                <th>Booked Date</th>
            </tr>
            <?php
                $bookingDetails = $crud->fetch_datas_with_column('booking_detail', 'user_id', $_SESSION['user']);
                $i=1;
                foreach($bookingDetails as $booking){
                   // echo $booking['sport_name']." at date ".$booking['slot_date']. " and quantity ".$booking['quantity']."</br>";
                    echo "<tr><td>".($i++)."</td><td>".$booking['sport_name']."</td><td> ".$booking['quantity']." </td><td>".$booking['slot_date']."</td></tr>";
                }
            ?></table>
            
        </div>
    </section>
    <?php
    }
    else header('Location: login.php');
    ?>


<?php include 'footer.php'; ?>