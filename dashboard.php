<?php include_once 'header.php';
?>
<div class="dashboard"> <h1 class="dashboardTitle"><i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard</h1><?php

if(isset($_SESSION['user'])) {
    $userInfo = $crud->fetch_data_with_id('users', 'user_id', $_SESSION['user']);

    //dashboard boxes
    $users = $crud->fetch_all_table_data('users');
    $sports = $crud->fetch_all_table_data('sport');
    $bookings = $crud->fetch_all_table_data('booking');
    
    $totalEarnings=0;
    foreach($bookings as $booking){$totalEarnings+=$booking['price'];}


    ?>
        <div class="dashboardContainer1">
            <div class="box box1">Total Users 
                <span class="totalNum"><?php echo count($users); ?></total> 
            </div>
            <div class="box box2">Total Sports 
                <span class="totalNum"><?php echo count($sports); ?></total> 
            </div>
            <div class="box box3">Total Bookings 
                <span class="totalNum"><?php echo count($bookings); ?></total> 
            </div>
            <div class="box box4">Total Earnings 
                <span class="totalNum">NPR. <?php echo $totalEarnings; ?></total>
            </div>

        </div>
        <div class="dashboardContainer2">
    <?php

    if($userInfo['role'] == 3) {
        if($msg != null) {
            echo $msg;
            $msg = null;
        }
        $activeUsers = $crud->fetch_datas_with_column('users', 'status', '1');
        ?>
        <div class="userStatusContainer">
        <!-- <div class="activeUsersContainer"> -->
        <h3>Registered users</h3><table><tr><th>Name</th><th>Change Status</tr>
        <?php

        foreach($activeUsers as $user){
           // echo $user['name'] . " ". $user['role'];
            if($user['role'] != 3)
            echo  "<tr><td>".$user['name'] ." </td><td><a class='deactivate' href='dashboard.php?deactivate=1&user=".$user['user_id']."'>DEACTIVATE</a></td></tr>";

        };
        $deactiveUsers = $crud->fetch_datas_with_column('users', 'status', '0');
        ?>
        <!-- </div><div class="activeUsersContainer">
        <h3>Deactive users</h3> -->
        <?php
        foreach($deactiveUsers as $user){
          //  echo $user['name'] . " ". $user['role'];
            if($user['role'] != 3) 
          {  echo "<tr><td>".$user['name']. " </td><td><a class='activate' href='dashboard.php?activate=1&user=".$user['user_id']."'>ACTIVATE</a></td></tr>"; }

        };

        ?>

      

        <!--BOOKING TABLE-->
        </table></div>

          <!--Tabs-->
        <div class="dashboardTabs">
            <button id="bookingTab">Booking Details</button>
            <button id="sportTab">Sports</button>
            <button id="locationTab">Locations</button>
            <button id="sportDetailTab">Sport Centres</button>
        </div>
        <div class="bookingDetails" id="bookingTable">
        <h3>All Booking Details</h3><table>
            <tr>
                <th>S.N.</th>
                <th>Sport Centre</th>
                <th>User</th>
                <th>No. Of Slots</th>
                <th>Booked Date</th>
            </tr>
        <?php
        //$bookingDetails = $crud->fetch_all_table_data('booking_detail');
        $bookings = $crud->fetch_all_table_data('booking');
        $i=1;
        foreach($bookings as $booking) {
          //  echo "<div class='detail'>".$booking['sport_name']. " by user ".$booking['name']." at date ".$booking['slot_date']. " and quantity ".$booking['quantity']."</div>";
            $sport = $crud->fetch_data_with_id('sport_detail','sport_detail_id',$booking['sport_detail_id']);
            $user = $crud->fetch_data_with_id('users','user_id',$booking['user_id']);
         // echo "<tr><td>".($i++). " </td><td> ".$booking['sport_name']. " </td><td> ".$booking['name']."  </td><td> ".$booking['slot_date']. "  </td><td>  ".$booking['quantity']." </td></tr> ";
         echo "<tr><td>".($i++). " </td><td> ".$sport['name']. " </td><td> ".$user['name']."  </td><td> ".$booking['quantity']."  </td><td> ".$booking['booking_date']. " </td></tr> ";
        }
        ?></table>
    
        <!--SPORTS TABLE-->
        </table></div>
        <div class="bookingDetails displayNone" id="sportTable">
        <h3>Available Sports</h3><table>
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Duration</th>
                <th>Price Per Person</th>
                <th>Available Centres</th>
            </tr>
        <?php
        //$bookingDetails = $crud->fetch_all_table_data('booking_detail');
        $sports = $crud->fetch_all_table_data('sport');
        $i=1;
        foreach($sports as $sport) {
          $sport_locations = $crud->fetch_datas_with_column('sport_detail','sport_id',$sport['sport_id']);
         echo "<tr><td>".($i++). " </td><td> ".ucfirst($sport['name']). " </td><td> ".$sport['slot_duration']." mins  </td><td> NPR. ".$sport['price']."  </td><td> ".count($sport_locations). " </td></tr> ";
        }
        ?></table>

         <!--LOCATION TABLE-->
         </table></div>
        <div class="bookingDetails displayNone" id="locationTable">
        <h3>Available Locations</h3><table>
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Available Sports</th>
            </tr>
        <?php
        //$bookingDetails = $crud->fetch_all_table_data('booking_detail');
        $locations = $crud->fetch_all_table_data('location');
        $i=1;
        foreach($locations as $location) {
           $sport_locations = $crud->fetch_datas_with_column('sport_detail','location_id',$location['location_id']);
         echo "<tr><td>".($i++). " </td><td> ".$location['location']. " </td><td> ".count($sport_locations). " </td></tr> ";
        }
        ?></table>

         <!--SPORT CENTRES-->
         </table></div>
        <div class="bookingDetails displayNone" id="sportDetailTable">
        <h3>Available Sport Centres</h3><table>
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Sport</th>
                <th>Location</th>
            </tr>
        <?php
        //$bookingDetails = $crud->fetch_all_table_data('booking_detail');
        $sport_details = $crud->fetch_all_table_data('sport_detail');
        $i=1;
        foreach($sport_details as $sport_detail) {
            $sport = $crud->fetch_data_with_id('sport','sport_id',$sport_detail['sport_id']);
           $sport_location = $crud->fetch_data_with_id('location','location_id',$sport_detail['location_id']);
          
         echo "<tr><td>".($i++). " </td><td> ".$sport_detail['name']. " </td><td> ".ucfirst($sport['name']). " </td><td> ".$sport_location['location']. " </td></tr> ";
        }
        ?></table>
    </div><?php
    }
    else {
        header('Location:index.php');
    }
}
else {
    header('Location:index.php');
}

?>
    </div> <!--dashboard container 2-->
</div>

<script>

var bookingTable = document.getElementById('bookingTable');
var sportTable = document.getElementById('sportTable');
var locationTable = document.getElementById('locationTable');
var sportDetailTable = document.getElementById('sportDetailTable');

var bookingTab = document.getElementById('bookingTab');
var sportTab = document.getElementById('sportTab');
var locationTab = document.getElementById('locationTab');
var sportDetailTab = document.getElementById('sportDetailTab');

function addDisplayNoneToAll() {
    bookingTable.classList.add('displayNone');
    bookingTab.style.background = "#f3f4ed";
    bookingTab.style.color = "#000";

    sportTable.classList.add('displayNone');
    sportTab.style.background = "#f3f4ed";
    sportTab.style.color = "#000";

    locationTable.classList.add('displayNone');
    locationTab.style.background = "#f3f4ed";
    locationTab.style.color = "#000";

    sportDetailTable.classList.add('displayNone');
    sportDetailTab.style.background = "#f3f4ed";
    sportDetailTab.style.color = "#000";
}


bookingTab.addEventListener("click", function(){ 
    addDisplayNoneToAll() ;
    bookingTable.classList.remove('displayNone');
    bookingTab.style.background = "#1b1717";
    bookingTab.style.color = "#fff";
    
 });

 sportTab.addEventListener("click", function(){ 
    addDisplayNoneToAll() ;
    sportTable.classList.remove('displayNone');
    sportTab.style.background = "#1b1717";
    sportTab.style.color = "#fff";
 });

 locationTab.addEventListener("click", function(){ 
    addDisplayNoneToAll() ;
    locationTable.classList.remove('displayNone');
    locationTab.style.background = "#1b1717";
    locationTab.style.color = "#fff";
 });

 sportDetailTab.addEventListener("click", function(){ 
    addDisplayNoneToAll() ;
    sportDetailTable.classList.remove('displayNone');
    sportDetailTab.style.background = "#1b1717";
    sportDetailTab.style.color = "#fff";
 });



</script>

<?php include_once 'footer.php'; ?>