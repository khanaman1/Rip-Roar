<?php include_once 'header.php'; ?>


<?php  
    $sportId = $_GET['sportId'];
   // echo $sportId;
?>

<div class="productDisplayContainer">

    <div class="imageGallery">
        <div class="carousel carousel-main" data-flickity>
        
        <?php 
            $sport = $crud->fetch_data_with_id('sport','sport_id',$sportId);
           $sport_details =$crud->fetch_datas_with_column('sport_detail', 'sport_id', $sportId) ; 
          // print_r($sport_details);
            //Display thumbnail1 , 2, and 3
        ?>
            <div class="carousel-cell"  style="background-image: url('dbImages/sports/<?php echo $sport['thumbnail1'] ?>');background-position:center;background-size: cover" ></div>
            <div class="carousel-cell"  style="background-image: url('dbImages/sports/<?php echo $sport['thumbnail2'] ?>');background-position:center;background-size: cover" ></div>
            <div class="carousel-cell"  style="background-image: url('dbImages/sports/<?php echo $sport['thumbnail3'] ?>');background-position:center;background-size: cover" ></div>
        </div>

        <div class="carousel carousel-nav"
        data-flickity='{ "asNavFor": ".carousel-main", "contain": true, "pageDots": false }'>
            <div class="carousel-cell" style="background-image: url('dbImages/sports/<?php echo $sport['thumbnail1'] ?>');background-position:center;background-size: cover" ></div>
            <div class="carousel-cell"  style="background-image: url('dbImages/sports/<?php echo $sport['thumbnail2'] ?>');background-position:center;background-size: cover" ></div>
            <div class="carousel-cell"  style="background-image: url('dbImages/sports/<?php echo $sport['thumbnail3'] ?>');background-position:center;background-size: cover" ></div>
        </div>
    </div>

    <div class="productInfoSection">
        <div class="productInfo">
            <h1 class="title"> <?php echo strtoupper($sport['name']); ?> </h1>

            <span class="description"><?php echo $sport['description']; ?></span>

            <hr />
            <div class="productInfoGrid">
            <span class="time"><i class="fas fa-tree"></i>  Available Seasons: <b> <?php echo $sport['available_season']; ?></b></span>
            <span class="time"><i class="fas fa-bell"></i>  Opens from <b><?php echo $sport['opening_time']; ?> till <?php echo $sport['closing_time']; ?></b></span>
            <span class="time"><i class="fas fa-layer-group"></i>  Total Slots Available: <b><?php echo $sport['total_slots']; ?></b></span>
            <span class="time"><i class="fas fa-clock"></i>  Slot Duration: <b><?php echo $sport['slot_duration']; ?> minutes</b></span>
            <span class="time"><i class="fas fa-warehouse"></i>  Maximum Capacity: <b><?php echo $sport['max_slot_capacity']; ?> persons per slot</b></span>

        </div>




            <hr />

            <span class="price"><i class="fas fa-tag"></i>  <b>NPR. <?php echo $sport['price']; ?></b></span>
           
        </div>

        <form action="sportDetail.php" method="POST" enctype="multipart/form-data">
            
            <h2> BOOK SPORT </h2>

            <div class="form-group">
                <label for="sport_detail_id" >Select Location:</label>
                <select name="sport_detail_id" >
                <?php 
                foreach($sport_details as $sport_detail) { ?>
                    <?php  $location =  $crud->fetch_data_with_id('location', 'location_id', $sport_detail['location_id']) ; ?>
                        <option value="<?php echo $sport_detail['sport_detail_id']; ?>"><?php echo $location['location'] . " (".$sport_detail['name'].")";  ?></option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" name="btnProceedBooking"  >Proceed to Booking </button>

        </form>
    </div>

</div>


<?php include_once 'footer.php'; ?>