<?php
session_start();
function message()
{
    //display on error
    if (isset($_SESSION['error'])) {
        echo "<div class='alert alert-danger text-center alert-dismissible'>
						<button class='close'>&times;</button>
						" . ucwords($_SESSION['error']) . "
					</div>
					";
        unset($_SESSION['error']);
    }


    //display on success
    if (isset($_SESSION['success'])) {
        echo "<div class='alert alert-success text-center alert-dismissable'>
						<button class='close'>&times;</button>
						" . ucwords($_SESSION['success']) . "
					</div>
					";
        unset($_SESSION['success']);
    }
}
