<?php include_once 'header.php'; ?>

   <!-- <section class="banner">
   </section> -->

<!-- 
      <h1>hello</h1> -->

      <div class="gallery js-flickity"
      data-flickity='{ "wrapAround": true, "autoPlay":3000, "pauseAutoPlayOnHover":false }'>
<!--     
        <div class="gallery-cell" style="background-image: url('assets/161229031_208787711029469_1005553149621362289_n_1920x1080.PNG'); background-size:cover;width:85%;">
                <div class="hero-section">
                    <div class="hero-text">EXPLORE TOURISM SPORT IN NEPAL</div> 
                    <button class="btn">Explore Now</button>
                </div>
            </div> -->

        <div class="gallery-cell" style="background-image: url('assets/One-day-Trisuli-River-Rafting.jpg'); background-size:cover;width:85%;">
                <div class="hero-section">
                    <div class="hero-text">EXPLORE ADVENTURE SPORT IN NEPAL</div> <br />
                    <a href= "explore.php" class="btn">Explore Now</a>
                </div>
            </div>
        <div class="gallery-cell" style="background-image: url('assets/sebastian-pena-lambarri-mGxKdwKhzEU-unsplash.jpg'); background-size:cover;width:85%;">
                <div class="hero-section">
                    <div class="hero-text">EXPLORE ADVENTURE SPORT IN NEPAL</div>  <br />
                    <a href= "explore.php" class="btn">Explore Now</a>
            </div>
        </div>
        <div class="gallery-cell" style="background-image: url('assets/BUNGY-COOL-GUY-copyright-The-Last-Resort-2.jpg'); background-size:cover;width:85%;">
                <div class="hero-section">
                    <div class="hero-text">EXPLORE ADVENTURE SPORT IN NEPAL</div>  <br />
                    <a href= "explore.php" class="btn">Explore Now</a>
                </div>
            </div>    
   
    
       
        <div class="gallery-cell" style="background-image: url('assets/Paragliding_Feltre_331_MS_6142_cropped_1920x1080.webp'); background-size:cover;width:85%;">
            <div class="hero-section">
                <div class="hero-text">EXPLORE ADVENTURE SPORT IN NEPAL</div>  <br />
                <a href= "explore.php" class="btn">Explore Now</a>
            </div>
        </div>
        <div class="gallery-cell" style="background-image: url('assets/BUNGY-CHRIST-copyright-The-Last-Resort-2.jpg'); background-size:cover;width:85%;">
            <div class="hero-section">
                <div class="hero-text">EXPLORE ADVENTURE SPORT IN NEPAL</div>  <br />
                <a href= "explore.php" class="btn">Explore Now</a>
            </div>
        </div>
    </div>



    <div class="introText">
        <h1>Tourism Sport In Nepal</h1>
        <hr style="width:2rem;margin-bottom:2rem" />
        Nepal is known for its beautiful mountains, culture, bio-diversity and countless alluring elements of bucket lists for every tourist. Despite all these enticing and sublime assets, Nepal has yet to reach the one million tourists annually landmark which was envisioned decades ago. In order to reach this landmark, the widening of tourism sector is a must for Nepal. The widening of the tourism sector will not only increase the no. of tourists in Nepal but will also assimilate the seasonal tourism into a year round tourism business. Among the diverse tourism portfolio, one of the promising platforms is the scope of sports tourism in Nepal.
        With the introduction of extreme sports which are best tailored for Nepal geographically, Nepal has the inherent quality to be the hotspot for sports tourism in the world.
        Let’s explore what Nepal has to offer for sports tourism.
    </div>


    <!-- <div class="section1">
        <div class="left">
            <h1>Skiing In Nepal</h1>
        A lot has been expected in the sector of skiing in Nepal but very less has been achieved in this sector. The tourism sector in Nepal has been a seasonal business for Nepal. The season mainly runs through October, November and December. In order to promote the winter tourism, ski sporting can be channeled to bring in the off season benefits which Nepal has been lacking for decades in the tourism business. The major trek routes in Nepal face a four month of snow. These routes can be included in the skiing sports tourism to promote the winter tourism in Nepal. Currently, there are no proper infrastructures in Nepal. The adventurers have to trek uphill or drop through helicopters to ski in Nepal. If only the responsible authorities could come up with infrastructures like gondola, chairlifts and hassle free permits in sports tourism then skiing would undeniably prosper in Nepal.
        </div>
        <div class="right cover1 coverImg"></div>
    </div>
    <div class="section2">
        <div class="left cover2 coverImg"></div>
        <div class="right ">
        <h1>Sky-diving and Paragliding</h1>
        <?php 
                   // $sports = $crud->fetch_all_table_data('sport');
                   // print_r($sports);
        ?> 
        Introduced in Everest region recently, the extreme aerial adventure of ski diving has taken its place on the bucket’s list for every sky diving buff from all over the world. Leaping through, the enthusiasts can now witness the 360 degree view of the 8000plus Himalayas including Everest.
Pokhara, the beautiful lake city also offers the sky diving for the enthusiasts. However, Pokhara is known more for Paragliding. The micro climate of Pokhara makes the paragliding a must do thing for every tourist who are in to sports or just for fun. Pokhara is the only city in Nepal to host the International paragliding competition every year.
        </div>
    </div>
    <div class="section3">
        <div class="left ">
            <h1>Great Himalayan Trek (GHT) </h1>
            Beyond the shadow of doubt, Nepal has been associated with Trekking. Along with trekking, the tourism sector has proposed a single belt of trail which encompasses a rough 1700km from the east end to the west end of Nepal. This trail is the longest of all in the Great Himalayan Trail. The adventurous trail blazers will now get to experience the comprehensive beauty of Nepal. The proposed trail consists of two belts, i.e. the upper Himalayan Trail and Lower Himalayan Trail which will only limit up to 5000 meters.
        </div>
        <div class="right cover3 coverImg"></div>
    </div> -->

    <div class="pop-up-wrapper " id="pop-up">
        <div class="go-back" onclick="closeModal();"><i class="fa fa-arrow-left"></i>
        </div>
        <div class="product-details">
          <div class="product-left">
            <div class="product-info">
              <div class="product-manufacturer" id="p-title">
              </div>
              <div class="product-title" >
                
              </div>
              <div class="product-price" >
                <!-- $320<span class="product-price-cents">03</span> -->
              </div>
            </div>
            <div class="product-image">
              <img src="https://via.placeholder.com/300" id="p-img"/>
            </div>
          </div>
          <div class="product-right">
            <div class="product-description" id="p-description">
              Designer Karim Rashid continues to put his signature spin on all genres of design through various collaborations with top-notch companies. Another one to add to the win column is his work with Italian manufacturer Chateau d’Ax.
            </div>
            <div class="product-available">
              Available Seasons: <span class="product-extended"><a href="#" id="p-opening-season"></a></span>
            </div>
            <!-- <div class="product-rating">
              <i class="fa fa-star rating" star-data="1"></i>
              <i class="fa fa-star rating" star-data="2"></i>
              <i class="fa fa-star rating" star-data="3"></i>
              <i class="fa fa-star" star-data="4"></i>
              <i class="fa fa-star" star-data="5"></i>
              <div class="product-rating-details">(3.1 - <span class="rating-count">1203</span> reviews)
              </div>
            </div> -->
            <div class="product-quantity" id="p-duration">
              <!-- <label for="product-quantity-input" class="product-quantity-label">Quantity</label>
              <div class="product-quantity-subtract">
                <i class="fa fa-chevron-left"></i>
              </div>
              <div>
                <input type="text" id="product-quantity-input" placeholder="0" value="0" />
              </div>
              <div class="product-quantity-add">
                <i class="fa fa-chevron-right"></i>
              </div> -->
            </div>
          </div>
          <div class="product-bottom">
            <div class="product-checkout">
               Price
              <div class="product-checkout-total">
                <!-- <i class="fa fa-usd"></i> -->
                <div class="product-checkout-total-amount" id="p-price">
                  <!-- 0.00 -->
                </div>
              </div>
            </div>
            <div class="product-checkout-actions">
              <a class="add-to-cart" href="#"   id="aLink"  >Book Now</a>
              
            </div>
          </div>
        </div>
      </div>

    <section class="" style="padding-left:0 !important;margin-left:0 !important;">
        <div class="bg" style="border-radius:0;padding-left:0;">

        <div class="title-text mt-20" >
            Available Sports
            
        <div class="title-underline mb-20"></div>
        </div>

        <div class="sport-carasoul js-flickity" data-flickity='{ "groupCells": true, "wrapAround": true, "pauseAutoPlayOnHover":false }' style="padding-left:0;">
            <?php 
            $sports = $crud->fetch_all_table_data('sport');

            foreach($sports as $sport) {
                ?>
                <div class="sport-box p-20" style="background-image: url('dbImages/sports/<?php echo $sport['thumbnail1'] ?>');background-position:center;background-size: cover" >
                    <div class="overlay">
                    <button class="sport-title" onclick="openModal(<?php echo "'".$sport['name'] ."' , '". $sport['price']."' ,'". $sport['description']."' , '". $sport['available_season']."' ,  '". $sport['slot_duration']."' ,'". $sport['sport_id']."' ,'". $sport['thumbnail2']."'"; ?>);" ><?php echo strtoupper($sport['name']); ?>
                    <i class="fas fa-arrow-right"></i></button>
                    </div>

                </div>
                <?php
            }
            ?>
        </div>
        </div>


    </section>


<?php include_once 'footer.php'; ?>