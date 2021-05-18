<?php include_once "header.php";
if(!isset($_SESSION['user'])) header('Location: login.php');

if(isset($_POST['bookingConfirmation'])) {
   // echo "Num of People: ".$_POST['number_of_people'];
    $date = $_POST['bookingDate'];
    $checkedBox = $_POST['ckb'];
   // echo nl2br("<br><br><br> date : ".$date . "\n quantity:  ". 
  //  count($checkedBox). "\n sport_detail_id:  ".
   // $_SESSION["sport_detail_id"] . "\n user_id:  ". $_SESSION['user']);

    $user_details = $crud->fetch_data_with_id('users', 'user_id', $_SESSION['user']);
   // echo nl2br("\nUsername: ".$user_details['name']);
   // echo nl2br("\nStart time and end time of all check boxes just add duration to get the end time");
    foreach($checkedBox as $checked) {
       //  echo "<br> start time : ".$checked;
    }

    $sport_details = $crud->fetch_data_with_id('sport_detail', 'sport_detail_id', $_SESSION['sport_detail_id']);
    $sport = $crud->fetch_data_with_id('sport','sport_id',$sport_details['sport_id']);
    
}
?>





    <!--Payment Confirmation--> 

    <section class="confirmationPage">

        

        <div class="confirmationDetails">
        <h1><i class="fas fa-handshake"></i> Thank You for Booking!</h1>
            <div class="detailsInner">

                <div class="middleContainer">
                    <div class="middleContainerChild1">
                        <h2><b>Date booked for: <span class="colorRed"><?php echo $date; ?></span></b></h2>
                        <h2>Booked by <?php echo $user_details['name']; ?> for <span style="color:#206a5d"><?php echo $sport_details['name']; ?></span></h2>
                    </div>
                    <div class="middleContainerChild2">
                <h2>Number Of Slots: <b><?php echo count($checkedBox); ?></b> </h2>
               <?php 
                $slots = array();
               foreach($checkedBox as $checked) {
                   $startTime = strtotime($checked);
                   $durationSeconds = $sport['slot_duration'] * 60;
                //    $endTime = date("H:i", time() + $durationSeconds ) ;
                $endTime = date("H:i:s", $startTime + $durationSeconds ) ;
                 array_push($slots,$checked,  $endTime);
                        if($sport['sport_id'] != 12)
                            echo "<span>( ".date("H:i:s", strtotime($checked))." - ".$endTime ." )</span> ";
                        else
                         {  
                             $startTimeStampTrek = date("M-d H:i:s", strtotime($date ." ". $checked));
                             $endD = date('Y-m-d', strtotime($date. ' + 11 days'));
                             $endTimeStampTrek = date("M-d H:i:s", strtotime($endD ." ".$checked));
                              echo "<span>( ".$startTimeStampTrek." - ".$endTimeStampTrek ." )</span> ";

                         }
                    } ?>
                <?php if(isset($_POST['number_of_people'])) { ?><h2>Number Of People per Slot: <b><?php echo $_POST['number_of_people']; ?></b> </h2> <?php } else { ?>  
                    <h2>Number Of People per Slot: <b>1</b> </h2> <?php }  ?>  
                    </div>

                </div>

                <?php 
                        if(isset($_POST['number_of_people'])){
                            $price=$sport['price'] * $_POST['number_of_people'];
                            $_SESSION['totalPrice'] = $price;
                        }
                        else{
                            $price=($sport['price'] * count($checkedBox));
                            $_SESSION['totalPrice'] = $price;
                        }
                ?>

                <div class="bottomContainer">
                    <div class="priceContainer">
                        <div class="left"></div>
                        <div class="right">
                            <div class="label">Total: &nbsp;</div>
                            <div class="price"><b><?php  echo " NPR.".$price; ?></b></div>
                        </div>
                    </div>
                        
                    <form class="paypalContainer" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST">

                        <?php 
                            if(isset($_POST['number_of_people']))
                            {
                                $_SESSION['booking_data'] = array("date" => $date,
                                                             "total" => $_SESSION['totalPrice'],
                                                            "numPeople" => $_POST['number_of_people'],
                                                                "numSlots" => count($checkedBox),
                                                                "slots" => $slots);
                            }
                            else{
                                $_SESSION['booking_data'] = array("date" => $date,
                                                             "total" => $_SESSION['totalPrice'],
                                                            "numPeople" => 1,
                                                                "numSlots" => count($checkedBox),
                                                                "slots" => $slots);
                            }

                            
                           // print_r($_SESSION['booking_data']);
                        ?>

                        <input type="hidden" name="cmd" value="_cart">
                        <input type="hidden" name="upload" value="1">
                        <input type="hidden" name="business" value="riproar12@gmail.com">
                        <!-- <input type="hidden" name="return" value="http://localhost/riproar/payment.php?payment=<?php //echo $_SESSION['totalPrice']; ?>"> -->
                        <input type="hidden" name="return" value="http://localhost/riproar/reciept.php">
                        <input type="hidden" name="cancel_return" value="http://localhost/riproar/sportDetail.php">

                        <!-- <input type="hidden" name="bookingDate" value="<?php echo $date; ?>"> -->
                        <input type="hidden" name="item_name_1" value="<?php echo $sport_details['name']; ?>">
                        <?php
                        if(isset($_POST['number_of_people'])) {
                            ?>
                                <input type="hidden" name="quantity_1" value="<?php echo  $_POST['number_of_people']; ?>">
                            <?php
                        }else{?>
                             <input type="hidden" name="quantity_1" value="<?php echo count($checkedBox); ?>">
                        <?php }?>


                        <input type="hidden" name="amount_1" value="<?php echo $sport['price']/119; ?>">

                       

                        <button name="checkout" type="paypal" value="PayPal" ><i class="fab fa-paypal"></i> Pay with Paypal</button>
                    </form>
                </div>


</div>
        </div>
                

        
    </section>

<!--div class="paymentContainer">
    <div class="receipt">
    <h1 style="color:#669b7c">Your Payment was successful</h1>
    <div class="payments m-20">
        <table>
            <tr>
                <td><p><b>Sport</b></p></td>
                <td><p><b>Location</b></p></td>
                <td><p><b>Schedule</b></p></td>
                <td><p><b>Price</b></p></td>
            </tr>
            <tr>
            <td><p>Wall Climbing</p></td>
            <td><p>Kathmandu</p></td>
            <td><p>1:00pm</p></td>
            <td><p>$22.00</p></td>
            </tr>
            <tr>
            <td><p>Bungee Jumping</p></td>
            <td><p>Kathmandu</p></td>
            <td><p>1:00pm</p></td>
            <td><p>$22.00</p></td>
            </tr>
            <tr>
            <td><p></p></td>
            <td><p></p></td>
            <td colspan="2" style="background-color: black;font-weight:600;text-align:center;color: white"><p>Total Amount:</p></td>
            <td></td>
            </tr>
            <tr>
            <td><p></p></td>
            <td><p></p></td>
            <td colspan="2" style="font-weight:600;text-align:center"><p>$50</p></td>
            <td></td>
            </tr>
        </table>
        <a class="pay">
            <div style="background:#537791">
            <p><i class="fas fa-print" style="fontsize:2rem"></i> &nbsp; &nbsp; Print Reciept</p>
            </div>
        </a>
    </div>
    </div>
</div-->

    <?php include_once "footer.php"; ?>