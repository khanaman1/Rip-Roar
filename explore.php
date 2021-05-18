<?php include_once 'header.php'; ?>
   
    <h1 class="exploreTitle">Explore diffrent Adventure Sports in Nepal!</h1>

    <div class="sportDisplay">


        <?php 
            $sports = $crud->fetch_all_table_data('sport');
          //  print_r($sports);
            foreach($sports as $sport) {
                ?>

                <div class="wrapper">
                    <div class="product-img">
                    <div class="img-wrapper"><img src="dbImages/sports/<?php echo $sport['thumbnail1'] ?>" height="420" width="327"></div>
                    </div>
                    <div class="product-info">
                        <div class="product-text">
                            <img class="responsiveImage" src="dbImages/sports/<?php echo $sport['thumbnail1'] ?>" >
                            <h1><?php echo strtoupper($sport['name']); ?></h1>
                            <h2>Available Seasons: <?php echo strtoupper($sport['available_season']); ?></h2>
                            <p><?php echo substr($sport['description'],0,200); ?>.... 
                                <a href="sport.php?sportId=<?php echo $sport['sport_id']; ?>"  >Read More</a>    
                            </p>
                        </div>
                        <div class="product-price-btn">
                            <p><span>NRS. <?php echo strtoupper($sport['price']); ?></span></p>
                            <a href="sport.php?sportId=<?php echo $sport['sport_id']; ?>" onclick="">Book Now</a> 
                            <!-- openModal(<?php// echo "'".$sport['name'] ."' , '". $sport['price']."' ,'". $sport['description']."' , '". $sport['available_season']."' ,  '". $sport['slot_duration']."' ,'". $sport['thumbnail2']."'"; ?>); -->
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>

    </div>

<script>
   
</script>

   


<?php include_once 'footer.php'; ?>