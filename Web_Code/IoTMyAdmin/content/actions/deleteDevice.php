<?php
/**
 * Written by Rafael Lopez Martinez in June 2015
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
  
include_once '../../includes/includes.php';

sec_session_start();
if(!isset($_SESSION['username'])) {
    header("Location: ../../logout.php");
    exit();
}

//Check parameters
if(!dbCheckDevName_exist($_GET['devName'])){
    $message = "Impossible to delete. This device is already deleted.";
    header('Location: ../error.php?errorMessage='.$message);
    exit();
}else{
    $message = dbDeleteDevice($_GET['devName']);
    if($message=='true'){
        header('Location: ../deleteDevice_success.php?devName='.$_GET['devName']);
        exit();
    }else{        
        header('Location: ../error.php?errorMessage='.$message);
        exit();
    }
}