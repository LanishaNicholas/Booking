<?php 
  require 'model/appointmentModel.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Book Appointment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <link rel="icon" href="img/cal.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet"
        type="text/css" />
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

</head>
<body>
    <div class="container-fluid">
        <!-- Carousel -->
        <div id="slideShow" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#slideShow" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#slideShow" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#slideShow" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#slideShow" data-bs-slide-to="3"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/slide1.jpg" alt="Los Angeles" class="d-block w-100"> 
                </div>
                <div class="carousel-item">
                    <img src="img/slide2.jpg" alt="Chicago" class="d-block w-100">
                    <div class="carousel-caption">
                        <h3>Health</h3>
                        <p>We care about your health!</p>
                    </div>
                </div>
                <div class="carousel-item">
                  <img src="img/slide3.jpg" alt="New York" class="d-block w-100">
                </div>
                <div class="carousel-item">
                  <img src="img/slide4.jpg" alt="New York" class="d-block w-100">
                </div>
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#slideShow" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#slideShow" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
            <!-- about the slide -->
            <div class="container-fluid mt-3">
                <h3>Health Care Center</h3>
                <p>A healthcare center, health center, or community health center is one of a network of clinics staffed by a group of general practitioners and nurses providing healthcare services to people in a certain area.</p>
            </div>
        </div>
    </div>
    <div class="container-fluid-sm border">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="img/logo.jpg" class="img-thumbnail" alt="HospitalLogo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="view/doctorAccount.php">Doctor</a>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#bookAppointment">Book Appointment</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="main collapse" id="bookAppointment">
            
             <form>
                <table>
                    <tr>
                        <th>
                            <?php
                              $aDoctorList = getDoctorsList(); 
                            ?>
                            <label for="doctor"><span style="color: red;">*</span>Appoinment for : </label>
                            <select name="doctor" id="doctor">
                              <option value="0">Please select the doctor</option>
                              <?php
                              foreach($aDoctorList as $doctorList ){ 
                              ?>
                                <option value="<?php echo $doctorList['dr_id']; ?>"><?php echo $doctorList['dr_name']; ?></option>
                              <?php 
                              }
                              ?>
                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <span style="color: red;">*</span>Appoinment date : 
                            <input type="text" name="date" class="form-control datepicker" autocomplete="off" id="datePicker">
                            <input type="hidden" name="bookingDate" id="bookingDate">
                        </th>
                    </tr>
                    <tr class="hide" id="timeSlot">
                      <th>
                          <span style="color: red;">*</span>Available Time :
                          <button class="button dateButton" id="bt1">9.00</button>
                          <button class="button dateButton" id="bt2">9.30</button>
                          <button class="button dateButton" id="bt3">10.00</button>
                          <button class="button dateButton" id="bt4">10.30</button>
                          <button class="button dateButton" id="bt5">11.00</button>
                          <button class="button dateButton" id="bt6">11.30</button>
                          <input type="hidden" name="availableSlot" id="availableSlot">
                      </th>
                    </tr>
                    <tr>
                        <td>
                            <span style="color: red;">*</span>Patient Name :
                            <input type="input" name="patient_name" id="patient_name" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Patient Gender: <br>
                            <input type="radio" id="male" name="gender" class="gender" value="0">
                            <label for="html">Male</label><br>
                            <input type="radio" id="female" name="gender" class="gender" value="1">
                            <label for="css">Female</label><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span style="color: red;">*</span>Patient Phone Number : <br>
                            <input type="input" name="phone_number" id="phone_number" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Patient comment : <br>
                            <input type="text" name="comment" id="comment" value="" style="width: 50%;height: 70px;">
                            <br>
                            <br>
                            <span style="color: red;" class="hide" id="validation">Please fill (*) fields</span>
                        </td>
                    </tr>
                </table>
                <div class="btnaln">
                    <button type="button" id="form_submit" class="completeBtn navMenu">Submit</button>
                </div>
                <div>
                    <button type="button" id="form_cancel" class="cancelBtn navMenu">Cancel</button>
                </div>
                
            </form>
            <div id="message" class="hide">
              <h1>Appoinment Booked Successfully</h1>
            </div>
        </div>
        <div class="container-fluid p-5 my-5 border">
            <p class="h3 text-center">Our Departments</p>
            <div class="row text-bg-color">
                <div class="col p-3 m-5 border">
                    <img src="img/pediatric.jpg" class="rounded mx-auto d-block zoom" alt="Pediatric">
                    <p class="h5 text-center mt-2">Pediatric</p>
                    <p>
                        A pediatrician is a doctor who focuses on the health of infants, children and young adults.Pediatric care starts at birth and lasts through a child’s 21st birthday.
                    </p>
                    
                    <a href="#pediatricDiv" id="pediatricShow" data-bs-toggle="collapse">More...</a>
                    <a href="#pediatricDiv" id="pediatricHide" class="hide"data-bs-toggle="collapse">Less...</a>
                    <div id="pediatricDiv" class="collapse">
                        <p> 
                            Pediatric care starts at birth and lasts through a child’s 21st birthday or longer. 
                            Pediatricians prevent, detect and manage physical, behavioral and developmental issues that affect children. Some pediatricians work in general practice. 
                            Others specialize in treating children with specific health conditions.
                        </p>
                    </div>
                </div>
                <div class="col p-3 m-5 border ">
                    <img src="img/gynecology.jpg" class="rounded mx-auto d-block zoom" alt="Gynecology">
                    <p class="h5 text-center mt-2">Gynecology</p>
                    <p>
                        A gynecologist is a doctor who specializes in female reproductive health. They diagnose and treat issues related to the female reproductive tract. 
                    </p>
                    <a href="#gynecologyDiv" id="gynecologyShow" data-bs-toggle="collapse">More...</a>
                    <a href="#gynecologyDiv" id="gynecologyLess" class="hide" data-bs-toggle="collapse">Less...</a>
                    <div id="gynecologyDiv" class="collapse">
                        <p>
                            They diagnose and treat reproductive system disorders such as endometriosis, infertility, ovarian cysts, and pelvic pain. They may also care for people with ovarian, cervical, and other reproductive cancers.
                            Some gynecologists also practice as obstetricians, who give care during pregnancy and birth. If a gynecologist has expertise in obstetrics, they’re called an OB-GYN.
                        </p>
                    </div>
                </div>
                <div class="col p-3 m-5 border">
                    <img src="img/gp.jpg" class="rounded mx-auto d-block zoom" alt="GP">
                    <p class="h5 text-center mt-2">General Physician</p>
                    <p>
                        General physicians only see patients who are referred to them by other doctors, usually by the patient's own general practitioner.
                    </p>
                    <a href="#gpDiv" id="gpShow" data-bs-toggle="collapse">More...</a>
                    <a href="#gpDiv" id="gpHide" class="hide" data-bs-toggle="collapse">Less...</a>
                    <div id="gpDiv" class="collapse">
                        <p>
                            General Physicians are highly trained specialists who provide a range of non-surgical health care to adult patients. 
                            They care for difficult, serious or unusual medical problems and continue to see the patient until these problems have resolved or stabilised.
                            Much of their work takes place with hospitalised patients and most general physicians also see patients in their consulting rooms.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- JQuery -->
<script src="js/script.js"></script>
</body>
</html>






