<?php include_once 'includes/crud.php';



$date = new DateTime($_GET['date']);
$id = $_GET['id'];

//fetch all the booking related to sport_detail_id
$datas = $crud->fetch_datas_with_column('booking_detail', 'sport_detail_id', $id);
//fetch the sport data
$sport_detail = $crud->fetch_data_with_id('sport_view', 'sport_detail_id', $id);

$max_num_of_people = $sport_detail['max_slot_capacity'];
$sport_id = $sport_detail['sport_id'];
$number_of_people = 0;

$show_number_form = false;
$max_people = 0;

//total schedule represents no of checkboxes
$total_schedule = $sport_detail['total_slots'];
//start time of first checkobx
$starting_time = new DateTime($sport_detail['opening_time']);
$closing_time = new DateTime($sport_detail['closing_time']);
//duration of each checkbox
$duration = $sport_detail['slot_duration'];
$max = 1;




for($i = 0; $i < $total_schedule; $i++) {
    $is_booked = false;
    /**
     * foreach booking with the sport_deatil_id check the date provided by user with slot_date and also check
     * start_time of current checkbox which is being created with slot_start time, if these two mactches then that
     * slot is booked!
    */

        foreach($datas as $data) {
            $slot_start = new DateTime($data['start_time']);
            $slot_date = new DateTime($data['slot_date']);
    

    
            if($slot_start->format('h:i') == $starting_time->format('h:i') && $date->format('y-m-d') == $slot_date->format('y-m-d')) {
                // echo $date->format('y-m-d'). " == ". $slot_date->format('y-m-d'). "<br>";
                // echo $slot_start->format('h:i'). "== " .$starting_time->format('h:i'). "<br>";
                $is_booked = true;
                $number_of_people = $data['number_of_people'];
            } 
    
        }

        /**
         * if the current checkbox is not booked then check max_num_of people for this checkbox if it's one then not need to
         * show number form.
         * If current checkbox is booked then check number_of_people left for this checkbox to be full. If not full then show
         * number form
         */
        if(!$is_booked) {
            //show the form if number of people is more than 1
            if($max_num_of_people != 1) {
                $show_number_form = true;
                if($sport_id != 12)
                    echo "<div class='sheduleCheckbox'><input class='multiSelect' type='checkbox' name='ckb[]' onclick='chkcontrol(this, ".$max_num_of_people.")' value='".$starting_time->format('h:i')."'/>".$starting_time->format('h:i A')." - ".$starting_time->add(new DateInterval('PT'. $duration.'M'))->format('h:i A')."</div>";
                else{
                    $date->setTime(9,00,00);
                    echo "<div class='sheduleCheckbox'><input class='multiSelect' type='checkbox' name='ckb[]' onclick='chkcontrol(this, ".$max_num_of_people.")' value='09:00:00'/>".$date->format('M-d h:i A')." - ".$date->add(new DateInterval('PT'. $duration.'M'))->format('M-d h:i A')."</div>";
                }
                   
            }
            else 
            echo "<div class='sheduleCheckbox'><input class='multiSelect' type='checkbox' name='ckb[]' value='".$starting_time->format('h:i')."'/>".$starting_time->format('h:i A')." - ".$starting_time->add(new DateInterval('PT'. $duration.'M'))->format('h:i A')."</div>";

            //if not booked show normal checkbox
            
            
        }
        else {
            //number_of_people zero means it's full
            if($number_of_people == 0) //if number_of_people is full i.e. 0 then show checked status
            echo "<div class='sheduleCheckbox sheduleCheckboxDisabled' ><input class='multiSelect' type='checkbox' name='ckb[]' onclick='return false;' value='".$starting_time->format('h:i')."' disabled/>".$starting_time->format('h:i A')." - ".$starting_time->add(new DateInterval('PT'. $duration.'M'))->format('h:i A')."</div>";
            else {
                // echo "slot_date is: ".$data['slot_date']. " and slot_start_time is : ".$data['start_time'];
                $show_number_form = true;
                echo "<div class='sheduleCheckbox'><input class='multiSelect' type='checkbox' name='ckb[]' onclick='chkcontrol(this, ".$number_of_people.")' value='".$starting_time->format('h:i')."'/>".$starting_time->format('h:i A')." - ".$starting_time->add(new DateInterval('PT'. $duration.'M'))->format('h:i A')."</div>";
            }//else respond to event 

        }

    }
    if($show_number_form) {
        echo "
        
            <div class='formGroup'>
            <i class='fas fa-layer-group'></i>
            <label for='slotSchedule'>Number Of People</label>

            <div id='numberOfPeople'> <input id='numberField' type='number' name='number_of_people' min='1' max='".$sport_detail['max_slot_capacity']."' required/> </div>
            </div>
        ";
    }

?>