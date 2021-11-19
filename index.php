<?php
	define("SITE_ADDR", "http://irepairny.com");
	include("./include.php");
	$site_title = 'irepairny';
?>
<html lang="en">
<head>
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Responsive </title>
    <link rel="stylesheet" href="slideshow.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?php echo $site_title; ?></title>



 <style>
 form{
        position: relative;
      
        transform: translate(-50%,-50%);
        transition: all 1s;
        width: 200px;
        height: 50px;
        background:gray;
        box-sizing: border-box;
        border-radius: 50px;
        border: 4px solid white;
        padding: 5px;
    }
    
    input{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 42.5px;
           background-color: orange;
        outline: 0;
        border: 0;
        display: none;
        font-size: 1em;
        border-radius: 50px;
      
    }
   
 
   form .fa{
        box-sizing: border-box;
        padding: 10px;
        width: 42.5px;
        height: 42.5px;
        position: absolute;
        top: 0;
        right: 0;
        border-radius: 50%;
        color: #07051a;
        text-align: center;
        font-size: 1.2em;
        transition: all 1s;
    }


    form:hover{
        
        background-color: orange;
        width: 300px;
        cursor: pointer;
    }
    
    form:hover input{
        display: block;
    }
    
    form:hover .fa{
        background: blue;
        color:yellow ;
    }</style>
    
</head>
<body>
  <nav class="navbar">
    <div class="content">
      <div class="logo">
        <a href="#">IREPAIRNY</a>
      </div>
      <ul class="menu-list">
        <div class="icon cancel-btn">
          <i class="fa fa-times"></i>
        </div>
        <li style="padding-left: 0px; "><a href="#"></a></li>
        <li ><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="frp.php">FRP</a></li>
        <li ><a href="#">Contact</a></li>
        <li style="padding-right: 200px; "><a></a> </li>
<li>

			

		
                
<div class="wrapper">
			<center>
				<form action="" method="GET" name="" >
				<input type="search"  name="k" style="color: Green;" placeholder="Search Here..."  autocomplete="off">
			

                <i class="fa fa-search">
               	<input type="submit" name="" value="GO>" style="color: red; font-style: bold; background-color: white; text-decoration: none; font-size: 20px " >
                </button></i>
				</form>
  </center>
  </div>
    
        
			
	
</li>



        <li><a href="mailto:irepairny.com@gmail.com" alt="blank"><i class="fa fa-envelope" style="color:red"></i>Mail</a></li>
         
          <li><a href=”tel:+1-877-538-5888″><i class="fa fa-phone" style="color:rgb(147, 226, 44)"></i>1-917-420-1700</a></li>
          
          <li ><a href="http://youtube.com/mamunbrishti" alt="blank"> <i class="fa fa-youtube" style="color:red"></i></a></li>
         
          <li> <a href="facebook.com/irnyc"><i class="fa fa-facebook" style="color:red"></i></a></li>
      </ul>
      <div class="icon menu-btn">
        <i class="fa fa-bars"></i>
      </div>
    </div>
  </nav>
    


			
                <div id="content">
				
<script>
    const body = document.querySelector("body");
    const navbar = document.querySelector(".navbar");
    const menuBtn = document.querySelector(".menu-btn");
    const cancelBtn = document.querySelector(".cancel-btn");
    menuBtn.onclick = ()=>{
      navbar.classList.add("show");
      menuBtn.classList.add("hide");
      body.classList.add("disabled");
    }
    cancelBtn.onclick = ()=>{
      body.classList.remove("disabled");
      navbar.classList.remove("show");
      menuBtn.classList.remove("hide");
    }
    window.onscroll = ()=>{
      this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
    }
    
  </script>


            </div>
 

			
	
		

    <br><br><br><br><br><br>
    <br><br><br><br>


    <br><br><br><br><br><br>
    <br><br><br><br>


    <br><br><br>


<div>
<ul class="slideshow">
  <li ><span>1</span>
  </li>
  <li ><span>2</span></li>
	<li ><span>3</span></li>
	<li ><span>4</span></li>
  <li ><span>5</span></li>
</ul>
</div>
    <br><br><br>
        <br><br><br>
  <div id="wrapper">
				<?php

					// CHECK TO SEE IF THE KEYWORDS WERE PROVIDED
					if (isset($_GET['k']) && $_GET['k'] != ''){
						
						// save the keywords from the url
						$k = trim($_GET['k']);

						// create a base query and words string
						$query_string = "SELECT * FROM search_engine WHERE ";
						$display_words = "";

						// seperate each of the keywords
						$keywords = explode(' ', $k); 
						foreach($keywords as $word){
							$query_string .= " keywords LIKE '%".$word."%' OR ";
							$display_words .= $word." ";
						}
						$query_string = substr($query_string, 0, strlen($query_string) - 3);

						// connect to the database
						$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

						$query = mysqli_query($conn, $query_string);
						$result_count = mysqli_num_rows($query);

						// check to see if any results were returned
						if ($result_count > 0){
							
							// display search result count to user
							echo '<br /><div class="right"><b><u>'.$result_count.'</u></b> results found</div>';
							echo 'Your search for <i>'.$display_words.'</i> <hr /><br />';

							echo '<table class="search">';

							// display all the search results to the user
							while ($row = mysqli_fetch_assoc($query)){
								
								echo '<tr>
									<td><h3><a href="'.$row['url'].'">'.$row['title'].'</a></h3></td>
								</tr>
								<tr>
									<td>'.$row['blurb'].'</td>
								</tr>
								<tr>
									<td><i>'.$row['url'].'</i></td>
								</tr>';
							}

							echo '</table>';
						}
						else
							echo 'No results found. Please search something else.';
					}
					else
						echo '';
				?>
</div>
<script data-ad-client="ca-pub-5016200241490594" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<div class="main_content">
<ul class="process">
<li> Call and talk about repair <i class="fa fa-phone fa-2x" style="padding: 10px; color: crimson;"></i> <i class="fa fa-arrow-right fa-2x" ></i></li>

<li> Make an appoinment <i class="fa fa-calendar fa-2x" style="padding: 10px; color: crimson;"></i> <i class="fa fa-arrow-right fa-2x" ></i></li>
<li>tecnician at your door<i class="fa fa-home fa-2x" style="padding: 10px; color: crimson;"></i> <i class="fa fa-arrow-right fa-2x" ></i></li>
<li>Repair Done<i class="fa fa-check fa-2x" style="padding: 10px; color: crimson;"></i> <i class="fa fa-arrow-right fa-2x" ></i>
<li>Make payment<i class="fa fa-money fa-2x" style="padding: 10px; color: crimson;"></i></li>
</ul>
<p>
  IF YOU BUSY ITS MORE EASY!</p>
  <ul class="process1">
<li> Call and talk about repair<i class="fa fa-phone fa-2x" style="padding: 10px; color: crimson;"></i> <i class="fa fa-arrow-right fa-2x" ></i></li>
<li> Send device to us<i class="fa fa-truck fa-2x" style="padding: 10px; color: crimson;"></i> <i class="fa fa-arrow-right fa-2x" ></i></li>
<li>Repair Done<i class="fa fa-check fa-2x" style="padding: 10px; color: crimson;"></i> <i class="fa fa-arrow-right fa-2x" ></i></li>
<li>Make payment<i class="fa fa-money fa-2x" style="padding: 10px; color: crimson;"></i> <i class="fa fa-arrow-right fa-2x" ></i></li>
<li>We send back to you<i class="fa fa-telegram fa-2x" style="padding: 10px; color: crimson;"></i> </li>
</ul>
</div>

<script data-ad-client="ca-pub-5016200241490594" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<div class="brand">
  <h2 style=" align-items: center;">User Profile Card</h2>
<ul>
<li class="card" style="text-decoration: none; color: gray; padding:50px;">
  <img src="apple.png" alt="John" style="height: 150px; width:150px">
  <h1><a href="apple.html" style="text-decoration: none; color: gray;">Apple</a></h1>
</li>
<li class="card" style="padding:50px;">
  <img src="samsung.png" alt="John" style="height: 150px; width:150px" >
  <h1><a href="apple.html" style="text-decoration: none; color: gray;" >Samsung</a></h1>
</li>

<li class="card" style="padding:50px;">
  <img src="lg.jpg" alt="John" style="height: 150px; width:150px" >
  <h1><a href="apple.html" style="text-decoration: none; color: gray;" >LG</a></h1>
</li>

<li class="card" style="padding:50px;">
  <img src="oneplus.jpg" alt="John" style="height: 150px; width:150px" >
  <h1><a href="apple.html" style="text-decoration: none; color: gray;" >OnePlus</a></h1>
</li>
</ul>

</div>     



<script data-ad-client="ca-pub-5016200241490594" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<div id="footer">
    <script data-ad-client="ca-pub-5016200241490594" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<div class="left">
					All Rights reserved by 2020<a href="https://www.irepairny.com" target="_blank">irepairny.com</a>
				</div>
				
				<div class="clear"></div>
			</div>



</body>
</html>
