<?php
   require '../model/DoctorTable.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Book Appointment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link type="text/css" rel="stylesheet" href="../css/style.css"/>
    <link rel="icon" href="../img/cal.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <div class="header">
        <h1>Appointments</h1>
    </div>
    <ul class="nav">
        <li><a href="../index.php">Public</a></li>
        <li><a href="doctorview.php" class="active">Doctor</a></li>
    </ul>
    <div id="navDanny">
        <?php 
            $dr_id  = isset($_GET['dr_id']) ? $_GET['dr_id'] : 0;
            $appointmentDetails   = getAppointmentDetails($dr_id);
        ?>
        <table>
            <tr>
                <th>
                    Patient Name
                </th>
                <th>
                    Patient's Comment
                </th>
                <th>
                    Booking Date
                </th>
                <th>
                    Booking Time
                </th>
                <th>
                    Status
                </th>
                <th>
                    Action
                </th>
            </tr>  
        
        <?php
            foreach($appointmentDetails as $values){
        ?>
            <tr>
                <td><?php echo $values['pt_name']; ?></td>
                <td><?php echo $values['pt_comment']; ?></td>
                <td>
                    <?php
                        $date=date_create($values['app_date']);
                        $bDate =  date_format($date,"d/m/Y");
                        echo $bDate;
                    ?>
                        
                </td>
                <td><?php echo $values['app_time'];?></td>
                <td>
                    <?php
                        if($values['app_status'] == 0){
                    ?>
                        <span class="danger"><?php echo "Booked"; ?></span>    
                    <?php
                        }else if($values['app_status'] == 1){
                    ?>
                        <span class="success"><?php echo "Completed"; ?></span> 
                    <?php
                        }
                    ?>
                </td>
                <td>
                    <?php
                        if($values['app_status'] == 0){
                    ?>
                        <button class="completeBtn cmpBtn navMenu" data-id="<?php echo $values['app_id']; ?>">Complete</button>
                    <?php
                        }else if($values['app_status'] == 1){
                        
                    ?>
                        <span class="success">Done</span>
                    <?php
                        }
                    ?>
                </td>
            </tr>
        <?php        
            }
        ?>
        </table>
    </div>
    
<!-- JQuery -->
<script src="../js/appointment.js"></script> 
</body>
</html>