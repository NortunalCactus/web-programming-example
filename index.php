<?php
$nameErr="";
$emailErr="";
$mobileErr="";
$creditcardErr="";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["movie"])) {
        $bookingMovie = $_POST["movie"];
    }
    if (isset($_POST["seats"])) {
        $bookingSeats = $_POST["seats"];
    }
    if (isset($_POST["cus"])) {
        $bookingCust = $_POST["cus"];
    }

    if (empty($bookingCust["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($bookingCust["name"]);
       if (!preg_match("/^[a-zA-Z ]*$/", $name)){
         $nameErr = "Only letters and whitespace are allowed.";
       } else {
        $nameErr = "";
       }
    }
    if (empty($bookingCust["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($bookingCust["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
         $emailErr = "Invalid email format";
      } else {
        $emailErr = "";
       }
    }
    if (empty($bookingCust["mobile"])) {
      $mobileErr = "Mobile phone is required";
    } else {
      $mobile = test_input($bookingCust["mobile"]);
      if (!preg_match("/^[0-9]{10}$/", $mobile)){
         $mobileErr = "Wrong phone number";
      } else {
        $mobileErr = "";
       }
    }

    if (empty($bookingCust["card"])) {
        $creditcardErr = "Credit card is required";
      } else {
        $creditcard = test_input($bookingCust["card"]);
        if (!preg_match("/^[0-9]{14,19}$/", $creditcard)){
           $creditcardErr = "Credit card must have 14-19 number";
        } else {
          $creditcardErr = "";
         }
      }

    if (empty($bookingMovie["day"])) {
        $bookingMovieDayErr = "Day is required";
    } else {
        $bookingMovieDayErr = "";
    }

    if (empty($bookingSeats["FCA"]) && empty($bookingSeats["FCP"]) && empty($bookingSeats["FCC"]) && empty($bookingSeats["STA"]) && empty($bookingSeats["STP"]) && empty($bookingSeats["STC"])) {
        $bookingSeatsErr = "Seats is required";
    } else {
        $bookingSeatsErr = "";
    }


    if ($nameErr == "" && $emailErr=="" && $mobileErr=="" && $creditcardErr=="" && $bookingMovieDayErr=="" && $bookingSeatsErr=="") {
        $data->movie = $bookingMovie;
        $data->seats =  $bookingSeats;
        $data->cust =  $bookingCust;
        $data->total = $_POST["total"];

        $dataJson = json_encode($data);
        
        writeToFile($dataJson);

        session_start();
        $_SESSION["movie"] = $bookingMovie;
        $_SESSION["seats"] = $bookingSeats;
        $_SESSION["cust"] = $bookingCust;
        $_SESSION["total"] = $_POST["total"];
        $newURL = "./receipt.php";

        header('Location: '.$newURL);
        exit;
    } else {
        session_unset();
    }
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialChars($data);
    return $data;

}
function writeToFile($data){
    $file = 'listreceipt.txt';
    $current = file_get_contents($file);   
    $current .= $data;
    file_put_contents($file, $current);
}
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Assignment 2</title>

  <!-- Keep wireframe.css for debugging, add your css to style.css -->
  <!-- <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled> -->
  <link rel="stylesheet" href="style.css" type="text/css">
  <!-- <script type="text/javascript" src="data.json"></script> -->
  <script src='script.js' defer></script>
  <script src='wireframe.js'></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <style>
        .anc .title{
            color: coral;
            font-size: 90px;
            text-align: center;
        }
        .anc > p{
            color: cornflowerblue;
            font-family: "Lucida Sans Typewriter", "Lucida Console", monaco, "Bitstream Vera Sans Mono", monospace; 
            font-size: 30px; 
            font-weight: 400; 
            text-align: left;
            margin-left: 10px;
        }
        .seat-name{
            color: #2EC4B6;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-weight: 600;
        }
        .title-2{
            font-family: "Lucida Sans Typewriter", "Lucida Console", monaco, "Bitstream Vera Sans Mono", monospace; 
            color: #D48166;
        }
        .disc-anno{
            color:  #F67280;
            font-family: "Lucida Sans Typewriter", "Lucida Console", monaco, "Bitstream Vera Sans Mono", monospace; 
        }

        .seat-type{
            color:  #355C7D;
            font-weight: 600;
            font-family: "Lucida Sans Typewriter", "Lucida Console", monaco, "Bitstream Vera Sans Mono", monospace; 
        }

        .normalprice{
            color: #F67280;
            font-style: italic;
        }

        .discountprice{
            color: #FECEAB;
            font-style: italic;
        }

        .title-3{
            font-family: "Lucida Sans Typewriter", "Lucida Console", monaco, "Bitstream Vera Sans Mono", monospace; 
            color: #A8E6CE;
        }


        #synopsis-movie_title{
            color: #CC527A;
            font-size: 50px;
            margin-left: 30px
        }

        #synopsis-movie_plot{
            color: #83AF9B;
            font-size: 20px; 
            margin-left: 30px;
        }

        iframe{
            height: 200px;
            width: 300px;
        }

        .row{
            margin-left: 30px;
        }
        
    </style>
</head>
    
<body>

  <header id="header">
    <img src="media/logo.png" alt="" width="300px" height="150px">
    <div>Cinemax</div>
  </header>

  <nav class="navbar navbar-expand-lg navbar-dark sticky-top" id="navigation">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="#anchor1">About Us</a>
            <a class="nav-item nav-link" href="#anchor2">Pricing</a>
            <a class="nav-item nav-link" href="#anchor3">Now Showing</a>
        </div>
    </nav>


  <main>
    <!--article id='Website Under Construction'-->
    <!-- Creative Commons image sourced from https://pixabay.com/en/maintenance-under-construction-2422173/ and used for educational purposes only -->
    <!--img src='../../media/website-under-construction.png' alt='Website Under Construction' /-->
    <!--/article-->
    <div class="anchor" id="aboutus"></div>
    <article id="section1" class="parallax">
    <div class = "anc">
      <p class = title>We are finally back!!!</p>
      <p>The cinema has reopened after extensive improvements and renovations.</p>
      <p>The projection and sound systems are upgraded with 3D Dolby Vision projection and Dolby Atmos sound. For more
        info, please visit this <a href="https://www.dolby.com/us/en/cinema">website</a></p>
      <p>There are new seats available with reclinable first class seats and standard seats.</p>
    </div>
    <div class = "row">
    <div class = "col">
        <p class = seat-name>Standard seat</p>
        <img src="media/standard.jpg" alt="">
    </div>
    <div class = "col">
        <p class = seat-name>First class seat</p>
        <img src="media/firstclass.jpg" alt="">
    </div>
    </div>
    
    </article>

    <div class="anchor" id="prices"></div>
    <article id="section2" class="parallax">
      <p class = "title-2">Pricing</p>
      <div>
        <p class = "disc-anno">The Cinema offers discounted pricing weekday afternoons at 12pm (ie weekday matinée sessions, Monday -
          Friday) and all day on Mondays and Wednesdays.</p>
      </div>
      <div id="pricing">
        <ul class = "list-group list-group-horizontal-sm row">
          <li class="list-group-item col-sm-4">
            <p class = "seat-type">Standard Adult (STA)</p>
            <p class="normalprice">$19.80</p>
            <p class="discountprice">$14.00</p>
          </li>
          <li class="list-group-item col-sm-4">
            <p class = "seat-type">First Class Adult (FCA)</p>
            <p class="normalprice">$30.00</p>
            <p class="discountprice">$24.00</p>
          </li>
          <li class="list-group-item col-sm-4">
            <p class = "seat-type">Standard Concession (STP)</p>
            <p class="normalprice">$17.50</p>
            <p class="discountprice">$12.50</p>
          </li>
        </ul>

        <ul class = "list-group list-group-horizontal-sm row">
          <li class="list-group-item col-sm-4">
            <p class = "seat-type">First Class Concession (FCP)</p>
            <p class="normalprice">$27.00</p>
            <p class="discountprice">$22.50</p>
          </li>
          <li class="list-group-item col-sm-4">
            <p class = "seat-type">Standard Child (STC)</p>
            <p class="normalprice">$15.30</p>
            <p class="discountprice">$11.00</p>
          </li>
          <li class="list-group-item col-sm-4">
            <p class = "seat-type">First Class Child (FCC)</p>
            <p class="normalprice">$24.00</p>
            <p class="discountprice">$21.00</p>
          </li>
        </ul>
      </div>
    </article>

    <div class="anchor" id="anchor3"></div>
        <article id="section3">
            <p class = "title-3">NOW SHOWING</p>
            <div id="movies" class="container-fluid">

                <div class="row align-items-center">
                    <div class="movie col-lg-6">
                        <div class="row align-items-center">
                            <div id="poster" class="col-sm-5"><figure><img src="media/avenger.jpg" alt="Avengers: Endgame" id='ACT'></figure></div>
                            <div class="movie-info col-sm-7">
                                <p>Avengers: Endgame</p>
                                <p>(M)</p>
                                <table>
                                    <tr>
                                        <td>Monday</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Tuesday</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Wednesday</td>
                                        <td>21:00</td>
                                    </tr>
                                    <tr>
                                        <td>Thursday</td>
                                        <td>21:00</td>
                                    </tr>
                                    <tr>
                                        <td>Friday</td>
                                        <td>21:00</td>
                                    </tr>
                                    <tr>
                                        <td>Saturday</td>
                                        <td>18:00</td>
                                    </tr>
                                    <tr>
                                        <td>Sunday</td>
                                        <td>18:00</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="movie col-lg-6">
                        <div class="row align-items-center">
                            <div id="poster" class="col-sm-5"><figure><img src="media/wedding.jpg" alt="Top End Wedding" id='AHF'></figure></div>
                            <div class="movie-info col-sm-7">
                                <p>Top End Wedding</p>
                                <p>(M)</p>
                                <table>
                                    <tr>
                                        <td>Monday</td>
                                        <td>18:00</td>
                                    </tr>
                                    <tr>
                                        <td>Tuesday</td>
                                        <td>18:00</td>
                                    </tr>
                                    <tr>
                                        <td>Wednesday</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Thursday</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Friday</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Saturday</td>
                                        <td>15:00</td>
                                    </tr>
                                    <tr>
                                        <td>Sunday</td>
                                        <td>15:00</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="movie col-lg-6">
                        <div class="row align-items-center">
                            <div id="poster" class="col-sm-5"><figure><img src="media/dumbo.jpg" alt="Dumbo" id='ANM'></figure></div>
                            <div class="movie-info col-sm-7">
                                <p>Dumbo</p>
                                <p>(PG)</p>
                                <table>
                                    <tr>
                                        <td>Monday</td>
                                        <td>12:00</td>
                                    </tr>
                                    <tr>
                                        <td>Tuesday</td>
                                        <td>12:00</td>
                                    </tr>
                                    <tr>
                                        <td>Wednesday</td>
                                        <td>18:00</td>
                                    </tr>
                                    <tr>
                                        <td>Thursday</td>
                                        <td>18:00</td>
                                    </tr>
                                    <tr>
                                        <td>Friday</td>
                                        <td>18:00</td>
                                    </tr>
                                    <tr>
                                        <td>Saturday</td>
                                        <td>12:00</td>
                                    </tr>
                                    <tr>
                                        <td>Sunday</td>
                                        <td>12:00</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="movie col-lg-6">
                        <div class="row align-items-center">
                            <div id="poster" class="col-sm-5"><figure><img src="media/prince.jpg" alt="The Happy Prince" id='RMC'></figure></div>
                            <div class="movie-info col-sm-7">
                              <p>The Happy Prince</p>
                              <p>(MA15+)</p>
                                <table>
                                    <tr>
                                        <td>Monday</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Tuesday</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Wednesday</td>
                                        <td>12:00</td>
                                    </tr>
                                    <tr>
                                        <td>Thursday</td>
                                        <td>12:00</td>
                                    </tr>
                                    <tr>
                                        <td>Friday</td>
                                        <td>12:00</td>
                                    </tr>
                                    <tr>
                                        <td>Saturday</td>
                                        <td>21:00</td>
                                    </tr>
                                    <tr>
                                        <td>Sunday</td>
                                        <td>21:00</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Begin form -->

    <article class = "parallax" id="sypnosis">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id='booking-form'>
        <!-- Movie -->
        <div class="row align-items-center synopsis-row">
            <div id="synopsis-info" class="col-lg-8">
                <p id="synopsis-movie_title"></p>
                <br>
                <p id="synopsis-movie_plot"></p>
                <input type="hidden" name="movie[id]">
                <input type="hidden" name="movie[namemovie]"> 
            </div>
            <div>
                <iframe class="trailer" src=""></iframe>
            </div>
        </div>
        <br>
        <br>
        <!-- Date -->
        <h2>Make a booking:</h2>
        <div id="booking-section">
            <div class='booking-date'>
                <input type="radio" name="booking" id='MON'>
                <label for='MON'></label>
            </div>
            <div class='booking-date'>
                <input type="radio" name="booking" id='TUE'>
                <label for='TUE'></label>
            </div>
            <div class='booking-date'>
                <input type="radio" name="booking" id='WED'>
                <label for='WED'></label>
            </div>
            <div class='booking-date'>
                <input type="radio" name="booking" id='THU'>
                <label for='THU'></label>
            </div>
            <div class='booking-date'>
                <input type="radio" name="booking" id='FRI'>
                <label for='FRI'></label>
            </div>
            <div class='booking-date'>
                <input type="radio" name="booking" id='SAT'>
                <label for='SAT'></label>
            </div>
            <div class='booking-date'>
                <input type="radio" name="booking" id='SUN'>
                <label for='SUN'></label>
            </div>
            <input type="hidden" name="movie[day]" required>
            <input type="hidden" name="movie[hour]" required>
        </div>
        
        <!-- Seat types -->
        <div class='row'>
            <div class='booking-box col-md-6'>
                <span class="seat-type">First Class</span>
                <div class='inner'>
                    <label for="adults">Adults:</label>
                    <input type="number" name="seats[FCA]" id="adults" min="0" max="10" class="seats">
                    <label for="concession">Concession:</label>
                    <input type="number" name="seats[FCP]" id="concession" min="0" max="10" class="seats">
                    <label for="children">Children:</label>
                    <input type="number" name="seats[FCC]" id="children" min="0" max="10" class="seats">
                </div>
            </div>
            <div class='booking-box col-md-6'>
                <span class = "seat-type">Standard</span>
                <div class='inner'>
                    <label for="adults">Adults:</label>
                    <input type="number" name="seats[STA]" id="adults" min="0" max="10" class="seats">
                    <label for="concession">Concession:</label>
                    <input type="number" name="seats[STP]" id="concession" min="0" max="10" class="seats">
                    <label for="children">Children:</label>
                    <input type="number" name="seats[STC]" id="children" min="0" max="10" class="seats">
                </div>
            </div>
        </div>
        <br>
        <br>
        <p id='total'>Total: $0.00</p>
        <input type="text" hidden="true" name="total" id="formtotal" value="1" >
        <!-- User info -->
        <p><?= (!empty($bookingMovieDayErr)) ? $bookingMovieDayErr : "";?></p>
        <p><?= (!empty($bookingSeatsErr)) ? $bookingSeatsErr : "";?></p>
        <div class='booking-box'>
            <span>Info</span>
            <div class='inner' id='info-table'>
                <table>
                    <tr>
                        <td>
                            <label for="name">Name</label>
                        </td>
                        <td>
                            <input type="text" id="name" name="cus[name]"  required>
                            <span class="error">* <?php echo $nameErr;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email</label>
                        </td>
                        <td>
                            <input type="email" id="email" name="cus[email]" required>
                            <span class="error">* <?php echo $emailErr;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mobile">Mobile</label>
                        </td>
                        <td>
                            <input type="tel" id="mobile" name="cus[mobile]" required>
                            <span class="error">* <?php echo $mobileErr;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="credit">Credit Card</label>
                        </td>
                        <td>
                            <input type="text" id="credit" name="cus[card]" required>
                            <span class="error">* <?php echo $creditcardErr;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="expiry">Expiry</label>
                        </td>
                        <td>
                            <input type="month" id="expiry"  name="cus[expiry]"  required min = "2020-7">
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <input type="submit" value="Order" id='orderBtn'>
    </form>
    </article>
  </main>

  <footer>
    <div>&copy;
      <script>
        document.write(new Date().getFullYear());
      </script> Nguyen Hoang Tan, s3806867. Last modified: 23/5/2020 Link to GitHub repository: https://github.com/s3806867/wp
    <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web
      Programming course at RMIT University in Melbourne, Australia.</div>
    <div>
    </div>
  </footer>

</body>

</html>