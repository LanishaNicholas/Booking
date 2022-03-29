<?php 
  require 'model/appointmentModel.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Book Appointment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <link rel="icon" href="img/cal.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet"
        type="text/css" />
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

</head>
<body>
<div class="header">
    <h1>Book Appointment</h1>
</div>

<div class="main">
    <ul class="nav">
        <li><a href="index.php" class="active">Public</a></li>
        <li><a href="view/doctorAccount.php">Doctor</a></li>
    </ul>
  
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

<!-- JQuery -->
<script src="js/script.js"></script>
</body>
</html>






