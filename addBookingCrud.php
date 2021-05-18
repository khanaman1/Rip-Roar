<?php //include_once 'header.php'; ?>
    
<?php
    date_default_timezone_set('America/New_York');
    $date = $_SESSION['booking_data']['date'];
    $user_id = $_SESSION['user'];
    $sport_detail_id = $_SESSION['sport_detail_id'];
    $price = $_SESSION['booking_data']['total'];
    $numPeople =  $_SESSION['booking_data']['numPeople'];
    $quantity =  $_SESSION['booking_data']['numSlots'];
     $currentTime = date("Y-m-d H:i:s",time()); //current time
    //$currentTime = date("Y-m-d H:i:s",strtotime($date)); //desired time

  //  echo "date: ".$date.", userID: ".$user_id.", sport_detail_id: ".$sport_detail_id.", price: ".$price.", quantity: ".$quantity;
   // echo "<br/>curTime: ".$currentTime;
  $InsertedBookingId = $crud->insert_booking($user_id, $sport_detail_id,$currentTime, $price, $quantity );  //Insert into booking table

  // echo "BOOKING ID: ".$InsertedBookingId;


   //Add to slot

   //slots start and end time
   //$i=0;
  // $sport_details = $crud->fetch_data_with_id('sport_detail', 'sport_detail_id', $_SESSION['sport_detail_id']);
  // $sport = $crud->fetch_data_with_id('sport','sport_id',$sport_details['sport_id']);
   $max_slot_capacity = $sport['max_slot_capacity'];
       // echo "<br>NumSlots: ";  
        //print_r($_SESSION['booking_data']['slots']);
       for($i =0; $i<$_SESSION['booking_data']['numSlots']*2;$i+=2)   //Iterates over every slot schedule
       { //echo "<br>Entered shedule loop";
           if($i != 1 && $i>1 ) echo ", ";
           $startTime = $_SESSION['booking_data']['slots'][$i];
           $endTime = $_SESSION['booking_data']['slots'][$i+1];
           $startTimeStamp = date("Y-m-d H:i:s",strtotime($date." ".$startTime));
           $endTimeStamp = date("Y-m-d H:i:s",strtotime($date." ".$endTime));
           if($sport['sport_id'] == 12)     //for trekking
           {
               $endD = date('Y-m-d', strtotime($date. ' + 11 days'));
                $endTimeStamp = date("Y-m-d H:i:s",strtotime($endD." ".$startTime));
           }

         // echo "<br>Start Timestamp: ".$startTimeStamp." , End TimeStamp: ".$endTimeStamp;
          // if($startTimeStamp == date("Y-m-d H:i:s",strtotime("2021-04-12 02:00:00"))){echo "Equalled!";}

           $slots = $crud->fetch_all_table_data('slot');
           $testTimeStamp =  date("Y-m-d H:i:s",strtotime("2021-04-09 09:15:01"));
          // $booking_detail = $crud->fetch_data_from_booking_detail(8, $testTimeStamp); //$_SESSION['sport_detail_id']
           //print_r($booking_detail);echo "COUNT: ".count($booking_detail);
           $alreadyExistCheck = false;
          // $booking_detail = $crud->fetch_data_from_booking_detail($_SESSION['sport_detail_id'], $slots['start_time']);
           $slot_id=0;
           foreach($slots as $slot) { 
               
                $booking_detail = $crud->fetch_data_from_booking_detail($_SESSION['sport_detail_id'], $startTimeStamp);
               if( count($booking_detail) > 0 ){$alreadyExistCheck = true;print_r($booking_detail);$slot_id=$booking_detail[0]['slot_id'];}
           }
           if(!$alreadyExistCheck){ 
               //insert the slot as new table row
              // echo "<br>Max slot Cap: ".$max_slot_capacity." ,numPeople:".$numPeople;
               $number_of_people = $max_slot_capacity - $numPeople;
             //  echo "<br>SLOT INSERT: "." STARTTIMESTAMP: ".$startTimeStamp.", ENDTIMESTAMP: ".$endTimeStamp.", NUM_PEOPLE: ".$number_of_people.", DATE: ".$date;
              $insertedSlotId = $crud->insert_slot($startTimeStamp, $endTimeStamp, $number_of_people, $date);
             //INSERT INTO BOOKED SLOT
             //   echo "<br>DATE INSERT: "." BOOKING ID: ".$InsertedBookingId.", SLOT ID: ".$insertedSlotId;
             $crud->insert_booked_slot($InsertedBookingId, $insertedSlotId);
           }
           else {
               //update number of people in the slot
               $booking_detail1 = $crud->fetch_data_from_booking_detail($_SESSION['sport_detail_id'], $startTimeStamp);
               if(count($booking_detail1)>0) {$updated_numPeople = $booking_detail1[0]['number_of_people'] - $numPeople;
              //  echo "<br>Update numPeople:  ".$updated_numPeople;
                $crud->update_numPeople_slot($slot_id, $updated_numPeople); }
           }
       }   
   
      // echo "<br>Max slot Cap: ".$max_slot_capacity." ,numPeople:".$numPeople;

       unset($_SESSION['booking_data']);
    ?>

<!-- <?php //include_once 'footer.php'; ?> -->