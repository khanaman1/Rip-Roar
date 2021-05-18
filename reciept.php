<?php include_once 'header.php'; ?>
<?php 

$user_details = $crud->fetch_data_with_id('users', 'user_id', $_SESSION['user']);
$sport_detail = $crud->fetch_data_with_id('sport_detail', 'sport_detail_id', $_SESSION['sport_detail_id']);
$sport = $crud->fetch_data_with_id('sport', 'sport_id', $sport_detail['sport_id']);

if(isset($_SESSION['booking_data'])){
    $_SESSION['reciept_data'] = $_SESSION['booking_data'];
    include_once 'addBookingCrud.php';
}

?>

<section class="invoiceContainer">
    <div class="invoicePage">
    
        <!-- <img src="assets/invoiceLogo.png" alt="INVOICE LOGO"> -->
        <div class="invoiceHeader"><div class="logo"> </div><h1>INVOICE</h1>
        <button onclick="window.print()"><i class="fas fa-print"></i></button>
        </div>

        <div class="invoiceBody">
            <div class="left">
                <span class="name"><?php echo $user_details['name']; ?></span>
                <span><?php echo $user_details['email']; ?></span>
                <span>From <?php echo $user_details['country']; ?></span>
            </div>
            <div class="right">

            </div>
        </div>

        

        <div class="bookingDetails">
            <h2> <?php echo $sport_detail['name']; ?> ( Booked for <?php echo $_SESSION['reciept_data']['date']; ?> )</h2>
            <div class="bookingDetailsBody">
                <div class="left">
                    <!-- <h3> Booked for <?php //echo $_SESSION['reciept_data']['date']; ?></h3> -->
                    <div><span class="tHead"> Number of slots </span><span class="content"> <?php echo $_SESSION['reciept_data']['numSlots']; ?></span></div>
                    <div><span class="tHead"> Number of people per slot  </span><span class="content"><?php echo $_SESSION['reciept_data']['numPeople']; ?></span></div>
                    <div><span class="tHead"> Shedules </span> <span class="content">
                    <?php 
                    //$i=0;
                        for($i =0; $i<$_SESSION['reciept_data']['numSlots']*2;$i+=2)
                        {
                            if($i != 1 && $i>1 ) echo ", ";
                            if($sport['sport_id'] != 12)
                            { echo date("H:i", strtotime($_SESSION['reciept_data']['slots'][$i]))." - ".date("H:i", strtotime($_SESSION['reciept_data']['slots'][$i+1])); } 
                             else {
                                 $date = $_SESSION['reciept_data']['date']; 
                                 $startTime = date("H:i:s", strtotime($_SESSION['reciept_data']['slots'][$i]));
                                $startTimeStampTrek = date("M-d H:i:s", strtotime($date ." ". $startTime));
                                $endD = date('Y-m-d', strtotime($date. ' + 11 days'));
                                $endTimeStampTrek = date("M-d H:i:s", strtotime($endD ." ".$startTime));
                                 echo "<span>( ".$startTimeStampTrek." - ".$endTimeStampTrek ." )</span> ";
                             }
                        }   
                    ?> </span></div>
                     <div style="border-bottom:0px;"><span class="tHead"><b> Price per Person </b></span><span class="content"> NPR.<b><?php echo $sport['price']; ?></b></span></div>
                </div>
                <!-- <div class="right">
                    
                </div> -->
            </div>

            
        </div>
        
        <div class="totalPrice">
                <span style="font-size:1.2rem">Total:</span> &nbsp;<span>NPR. <?php echo $_SESSION['reciept_data']['total']; ?></span>
            </div>
        <?php //print_r($_SESSION['reciept_data']); ?>    

    </div>
</section>

<?php include_once 'footer.php'; ?>