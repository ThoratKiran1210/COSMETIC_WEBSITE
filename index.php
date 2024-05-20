<?php $connect = mysqli_connect('localhost', 'root','', 'project'); ?>

<?php
//! Sending data to cart 
if(isset($_POST['submit'])){
  $id = $_POST['id'];
  $name = $_POST['name'];
  $image = $_POST['image'];
  $price = $_POST['price'];

  $query_for_add_data_in_cart = "INSERT INTO cart(product_id, product_name, product_image, product_price) VALUES ('$id', '$name', '$image',  '$price')";

  $result_for_add_data_in_cart = mysqli_query($connect, $query_for_add_data_in_cart);

  if(!$result_for_add_data_in_cart){
    echo 'ERROR in adding cart Query..';
  }


}
?>

<?php
  
  if(!$connect) {
    echo 'DB Connection Error...';
  }
  $query = "SELECT * FROM products";
  $result = mysqli_query($connect,$query);
  if(!$result){
    echo 'Somthing is wrong with Query...';
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cosmetics website</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
    />

    <link rel="stylesheet" href="style.css" />
  </head>

  <body>
    
    <section id="header" class="header">
      <a class="logo"><i class="fas fa-female"></i> Cosmetics</a>
      <nav class="navbar">
        <input type="search" class="search-box" id="search-input" placeholder="Search..." />
        <a href="#home">home</a>
        <a href="#about">about us</a>
        <a href="#shop">shop</a>
        <a href="#gallery">gallery</a>
        <a href="#blogs">blogs</a>
        <a href="#message">Contact us</a>
        <a href="#quiz">Quiz</a>
      </nav>

      <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <a href="#heart" class="fas fa-heart"></a>
        <a href="cart.php" class="fas fa-shopping-cart"></a>
        <!-- <a>
          <img style='width: 30px; height: 30px;' src= "./skinCare/user-regular.svg"/>
        </a>         -->
          
      </div>
    </section>


    <section id="slider" class="home">
      <div class="slide active" style="background: url(./skinCare/model.jpg) no-repeat;       background-size: cover; background-position: center;">
          <div class="content">
              <span>forever <br />beautiful</span>
              <pre style="font-size: 20px; color: #fff;"><br><br>
                🌸 Welcome to Beauty Bliss! 🌸<br />
                  Dive into a realm of elegance and grace at Beauty Bliss,<br> where every stroke of makeup is a canvas of your individuality! <br /> 💋 Explore the latest beauty trends. <br /> ✨ Unleash your inner glow. <br /> 🌼 Embrace your unique beauty. <br />
                  Let's create enchantment together! 💄
              </pre>
          </div>
      </div>
      <div class="slide" style="background: url(./skinCare/female-models-.webp) no-repeat; background-size: cover; background-position: center;">
          <div class="content">
              <span>forever <br />beautiful</span>
              <pre style="font-size: 20px; color: #fff;"><br><br>
                🌸 Find everything you need to know about<br> the best makeup tools and helpful <br>application techniques straight from the pros.<br /> Read on for tips and tricks no matter your skill level.🌸
              </pre>
          </div>
      </div>
      
      <div id="next-slide" onclick="next()" class="fas fa-angle-right"></div>
      <div id="prev-slide" onclick="prev()" class="fas fa-angle-left"></div>
  </section>
  


    
    <section class="about" id="about">
      <div class="img">
        <img
          src="./skinCare/model1.png"
          alt="Image"
          width="200"
        />
      </div>
      <div class="content">
        <div class="box">
          <h3>About <span>Us...</span></h3>
          <p>
            Welcome to Cosmetics website! We're Anjali and Kiran, the proud
            owners of this newly created makeup website.passionate about beauty
            and dedicated to offering quality, sustainable, and inclusive makeup
            products and services.💄❤ <br />

            Our focus is on customer satisfaction, transparency, and excellent
            support. <br />
            Meet our team, explore our collections, and connect with us for an
            exceptional beauty experience.<br />

            Thank you for choosing Cosmetics website!❤
          </p> 
        </div>
        <div class="icons-container">
          <div class="icons">
            <i class="fas fa-address-card"></i>
            <p>Address card</p>
          </div>
          <div class="icons">
            <i class="fas fa-award"></i>
            <p>Award cards</p>
          </div>
          <div class="icons">
            <i class="fas fa-gift"></i>
            <p>Gift cards</p>
          </div>
        </div>
      </div>
    </section>


    <section class="shop" id="shop">
      <h1 class="heading">Our <span>shop</span></h1>
      <div class="box-container">

      <?php
while($row = mysqli_fetch_assoc($result)){
  $id = $row['product_id'];
  $name = $row['product_name'];
  $image = $row['product_image'];
  $rPrice = $row['product_rPrice'];
  $dPrice = $row['product_dPrice'];
?>

<div class="box">
  <form action="index.php" method='post'>
    <div class="img">
      <img src="<?php echo $image;?>" alt="" width="250"/>
      <div class="icons">
        <a href="#heart" class="fas fa-heart"></a>
      </div>
    </div>
    <div class="content">
      <h3><?php echo $name;?></h3>
      <div class="price">₹<?php echo $dPrice;?><span> ₹<?php echo $rPrice;?></span></div>
      <!-- Hidden input fields for product details -->
      <input type="hidden" name="id" value="<?php echo $id;?>">
      <input type="hidden" name="name" value="<?php echo $name;?>">
      <input type="hidden" name="image" value="<?php echo $image;?>">
      <input type="hidden" name="price" value="<?php echo $dPrice;?>">
      <br />
      <button type="submit" class="btn" name="submit" style="color: black">Add to cart</button>
    </div>
  </form>
</div>
<?php
}
?>
      </div>
    </section>




  <section class="Banner">
      <div class="content">
        <span>Special <span>offer</span></span>
        <h3>upto 50% off</h3>
        <p>
          "Revamp your beauty routine with our exclusive 50% off makeup sale.
          Grab your favorite products at unbeatable prices and elevate your look
          today!"
        </p>
        <a href="#shop" class="btn" style="color: black">Shop now</a>
      </div>
    </section>

    
    <section class="gallery" id="gallery">
      <h1 class="heading">Our <span>Gallery</span></h1>
      <div class="box-container">
        <div class="box">
          <img
            src="./skinCare/look-face-style-portrait-makeup.jpg"
            width="180"
          />
          <div class="content">
            <h3>face</h3>
            <p>Faces that speak volumes of beauty <br>and emotion.</p>
            <!-- <a href="#" class="btn" style="color: black">Read More</a> -->
          </div>
        </div>
        <div class="box">
          <img
            src="./skinCare/cute-hairstyle-eye-makeup.png"
            width="200"
          />
          <div class="content">
            <h3>eyes</h3>
            <p>
              Embrace the magic of makeup as it transforms <br> eyes into
              windows of beauty and confidence
            </p>
            <!-- <a href="#" class="btn" style="color: black">Read more</a> -->
          </div>
        </div>
        <div class="box">
          <img
            src="./skinCare/lip-model.png"
            width="200"
          />
          <div class="content">
            <h3>lips</h3>
            <p>
              Lips, the canvas of expression, speak volumes <br> with every shade of
              makeup.
            </p>
            <!-- <a href="#" class="btn" style="color: black">Read more</a> -->
          </div>
        </div>
        <div class="box">
          <img
            src="./skinCare/Woman-Hair-.png"
            width="200"
          />
          <div class="content">
            <h3>hairs</h3>
            <p>
              Hair, the crown you never take off, shines with <br/>beauty and
              personality, styled to perfection
            </p>
            <!-- <a href="#" class="btn" style="color: black">Read more</a> -->
          </div>
        </div>

        <div class="box">
          <img
            src="./skinCare/makeup-transparent.png"
            width="200"
          />
          <div class="content">
            <h3>Makeup</h3>
            <p>
              Makeup is not just colors on a palette; it's a transformative art
              that enhances beauty and <br/>boosts confidence
            </p>
            <!-- <a href="#" class="btn" style="color: black">Read more</a> -->
          </div>
        </div>

        <div class="box">
          <img
            src="./skinCare/skin.jpg"
            width="200"
          />
          <div class="content">
            <h3>skincare</h3>
            <p>
              Skincare is the foundation of beauty, nurturing<br/> your skin to
              reveal a healthy, vibrant complexion.
            </p>
            <!-- <a href="#" class="btn" style="color: black">Read more</a> -->
          </div>
        </div>
      </div>
    </section>


    <section class="blog" id="blogs">
      <h1 class="heading">Daily <span>blogs</span></h1>
      <div class="box-container">
        <div class="box">
          <div class="img">
            <img
              src="./skinCare/cosmetic-cream-oil-honey.jpg"
              alt="image"
              width="700"
            />
          </div>
          <div class="content">
            <div class="date">
              <h3>10</h3>
              <h3>April</h3>
            </div>
            <a href="#" class="user"><i class="fas fa-user"></i> By admin</a>
            <a href="#" class="title" style="color: black">
              Blog title goes here...</a
            >
            <p>Exploring the Latest Trends in Makeup and Beauty</p>
            <!-- <a href="#" class="btn" style="color: black"> Read More </a> -->
          </div>
        </div>

        <div class="box">
          <div class="img">
            <img
              src="./skinCare/459610.jpg"
              alt="image"
              width="700"
            />
          </div>
          <div class="content">
            <div class="date">
              <h3>10</h3>
              <h3>April</h3>
            </div>
            <a href="#" class="user"><i class="fas fa-user"></i> By admin</a>
            <a href="#" class="title" style="color: black">
              Blog title goes here...</a
            >
            <p>
              Unveiling Beauty Secrets and Expert Tips for Makeup Enthusiasts
            </p>
            <!-- <a href="#" class="btn" style="color: black"> Read More </a> -->
          </div>
        </div>

        <div class="box">
          <div class="img">
            <img
              src="./skinCare/makepukit.webp"
              alt="image"
              width="700"
            />
          </div>
          <div class="content">
            <div class="date">
              <h3>10</h3>
              <h3>April</h3>
            </div>
            <a href="#" class="user"><i class="fas fa-user"></i> By admin</a>
            <a href="#" class="title" style="color: black">
              Blog title goes here...</a
            >
            <p>Your Ultimate Guide to Makeup Must-Haves and Beauty Trends</p>
            <!-- <a href="#" class="btn" style="color: black"> Read More </a> -->
          </div>
        </div>
      </div>
    </section>


    <section class="message" id="message">
      <form action="" id="contactForm">
        <h3>Get in <span>touch</span></h3>
        <input type="text" placeholder="Full name" class="box" required />
        <input type="email" placeholder="Email (username@gmail.com)" class="box" required />
        <input type="tel" placeholder="Phone(optional)" class="box" inputmode="numeric"/>
        <textarea placeholder="Visit us again" class="box" cols="30" rows="10" required></textarea>
        <input type="submit" value="Send message" style="color: black; background-color: darksalmon" class="btn" />
      </form>
    </section>



    <section id="quiz">
      <div class="quiz-container" id="quiz-container">
        <h2>Discover Your Perfect Makeup Look!</h2><br>
        <div class="question">
          <p>What is your skin type?</p>
          <input type="radio" name="skinType" value="dry"> Dry
          <input type="radio" name="skinType" value="oily"> Oily
          <input type="radio" name="skinType" value="combination"> Combination
        </div><br>
        <div class="question">
          <p>What is your preferred makeup style?</p>
          <input type="radio" name="makeupStyle" value="natural"> Natural
          <input type="radio" name="makeupStyle" value="glam"> Glamorous
          <input type="radio" name="makeupStyle" value="bold"> Bold
        </div><br>
        <div class="question">
          <p>How much coverage do you prefer from your foundation?</p>
          <input type="radio" name="foundationCoverage" value="light"> Light
          <input type="radio" name="foundationCoverage" value="medium"> Medium
          <input type="radio" name="foundationCoverage" value="full"> Full
        </div><br>
        <div class="question">
          <p>Do you have any specific skin concerns you'd like to address with makeup?</p>
          <input type="checkbox" name="skinConcerns" value="redness"> Redness
          <input type="checkbox" name="skinConcerns" value="darkCircles"> Dark Circles
          <input type="checkbox" name="skinConcerns" value="acneScars"> Acne Scars
        </div><br>
        <button class="btn" onclick="submitQuiz()">Submit</button>
      </div>
    </section>
    

    <section class="services">
      <div class="box">
        <img
          src="./skinCare/delivery.jpg"
          alt="image"
          width="200"
        />
        <h3>Free delivery</h3>
        <p>
          Get your favorite beauty products at your doorstep in no time, because
          beauty shouldn't wait!
        </p>
      </div>

      <div class="box">
        <img
          src="./skinCare/secure-payment.jpg"
          alt="image"
          width="200"
        />
        <h3>Secure payments</h3>
        <p>
          Shop with confidence knowing that your transactions are protected by
          the latest encryption technology, ensuring a safe and hassle-free
          shopping experience
        </p>
      </div>

      <div class="box">
        <img
          src="./skinCare/customer-support.jpg"
          alt="image"
          width="200"
        />
        <h3>24/7 support</h3>
        <p>
          Need assistance? Our team is available 24/7 to answer your questions,
          resolve issues, and make your shopping experience exceptional
        </p>
      </div>
    </section>


    <section class="footer">
      <div class="box-container">
        <div class="box">
          <h3>Quick links</h3>
          <a class="link" href="#home"
            ><i class="fas fa-angle-right"></i> Home</a
          >
          <a class="link" href="#about"
            ><i class="fas fa-angle-right"></i> About</a
          >
          <a class="link" href="#shop"
            ><i class="fas fa-angle-right"></i> Shop</a
          >
          <a class="link" href="#message"
            ><i class="fas fa-angle-right"></i> Message</a
          >
          <a class="link" href="#gallery"
            ><i class="fas fa-angle-right"></i> Gallery</a
          >
          <a class="link" href="#blogs"
            ><i class="fas fa-angle-right"></i> Blogs</a
          >
          <a class="link" href="#quiz"
            ><i class="fas fa-angle-right"></i> Quizz</a
          >
        </div>


        <div class="box">
          <h3>Extra links</h3>
          <a class="link" href="#"
            ><i class="fas fa-angle-right"></i> My favorite</a
          >
          <a class="link" href="#"
            ><i class="fas fa-angle-right"></i> My order</a
          >
          <a class="link" href="#"
            ><i class="fas fa-angle-right"></i> My wishlist</a
          >
          <a class="link" href="#"
            ><i class="fas fa-angle-right"></i> Private policy</a
          >
          <a class="link" href="#"
            ><i class="fas fa-angle-right"></i> Terms of use</a
          >
        </div>

        <div class="box">
          <h3>Contact info</h3>
          <a class="link" href="#"
            ><i class="fas fa-phone"></i> +111-222-3333</a
          >
          <a class="link" href="#"
            ><i class="fas fa-phone"></i> +123-456-7890</a
          >
          <a class="link" href="#"
            ><i class="fas fa-envelope"></i> anjalifranky54@gmail.com</a
          >
          <a class="link" href="#"
            ><i class="fas fa-map"></i> Pune, India - 411047</a
          >
        </div>
        <div class="box">
          <h3>Newsletter</h3>
          <b style="font-size: 1.5rem;">Subscribe for latest updates</b>
          <form action="" id="subscribe-form">
            <input style="border-radius: 10px;"
              type="email"
              name=""
              placeholder="Email Address"
              id=""
              class="email"
            />
            <input
              type="submit"
              value="Subscribe"
              id="subscribe"
              class="btn"
              style="color: black; border-radius: 10px"
            />
          </form>
          <div id="success-msg" class="success-message" style="display: none;"></div>
        </div>
      </div>
      <div class="credit">
        CopyRight by @<span>Anjali & Kiran</span> || all rights reserved
      </div>
    </section>


    <script src="script.js" defer></script>
  </body>
</html> 


