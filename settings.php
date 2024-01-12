<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet">
      <link rel="stylesheet" href="bord.css">
      <link rel="stylesheet" href="personal.html">
      <title> VET DashBoard</title>
        
</head>
<body>
    <div class="container">
        <aside>
            <div class="top">
              <div class="logo">
                <img src="Logo_Reserve.jpg">
                <h2>Veteran<span class="danger">Platform</span></h2>
              </div>
                <div class="close" id="close-btn">
                  <span class="material-icons-sharp">
                    close
                  </span>
                </div>
            </div>

    <div class="sidebar">
        <a href="#">
            <span class="material-icons-sharp">
                grid_view
                </span>
            <h3>DashBoard</h3>
        </a>
           
        <a href="bord.html">
            <span class="material-icons-sharp">
                receipt_long
                </span>
            <h3>Home</h3>
        </a>
        <a href="updates.php">
            <span class="material-icons-sharp">
                insights
                </span>
            <h3>Updates</h3>
        </a>
      
        
        <a href="skills.php">
            <span class="material-icons-sharp">
                inventory
                </span>
            <h3>Skills</h3>
        </a>
        <a href="health.php">
            <span class="material-icons-sharp">
                report_gmailerrorred
                </span>
            <h3>Health</h3>
        </a>
                <a href="messages.php">
                    <span class="material-icons-sharp">
                    email 
                    </span>   
            <h3>Messages</h3>
            <span class="message-count">02</span>
        </a>
        <a href="settings.html">
            <span class="material-icons-sharp">
                settings
                </span>
            <h3>Settings</h3>
        </a>
        <a href="retires.php">
            <span class="material-icons-sharp">
                add
                </span>
            <h3>Add Personnel</h3>
        </a>
        <a href="proper.html">
            <span class="material-icons-sharp">
                logout
                </span>
            <h3>Logout</h3>
        </a>
    </div>
    </aside>
    <div class="right">
    <div class="top">
        <button id="menu-btn">
            <span class="material-icons-sharp">
                menu
                </span>
        </button>
        <div class="theme-toggler">
            <span class="material-icons-sharp active">
                light_mode
            </span>
            <span class="material-icons-sharp">
                    dark_mode
            </span>
        </div>
        <div class="profile">
            <div class="info">
                <p>Hey, <b>Ivan</b></p>
                <small class="text-muted">Admin</small>
            </div>
            <div class="profile-photo">
                <img src="gd.jpg">
            </div>
            </div>
        </div>
<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted form values
    $cacheEnabled = isset($_POST['cacheEnabled']) ? true : false;
    $cacheDuration = isset($_POST['cacheDuration']) ? $_POST['cacheDuration'] : 0;
    
    $compressionEnabled = isset($_POST['compressionEnabled']) ? true : false;
    $compressionLevel = isset($_POST['compressionLevel']) ? $_POST['compressionLevel'] : 'low';
    
    $imageCompressionLevel = isset($_POST['imageCompressionLevel']) ? $_POST['imageCompressionLevel'] : 'low';
    $imageFormat = isset($_POST['imageFormat']) ? $_POST['imageFormat'] : 'jpeg';
    
    $cdnEnabled = isset($_POST['cdnEnabled']) ? true : false;
    $cdnEndpoint = isset($_POST['cdnEndpoint']) ? $_POST['cdnEndpoint'] : '';
    
    $cacheSize = isset($_POST['cacheSize']) ? $_POST['cacheSize'] : 0;
    $timeout = isset($_POST['timeout']) ? $_POST['timeout'] : 0;
    
    $loadBalancingEnabled = isset($_POST['loadBalancingEnabled']) ? true : false;
    $loadBalancingAlgorithm = isset($_POST['loadBalancingAlgorithm']) ? $_POST['loadBalancingAlgorithm'] : 'roundRobin';
    
    $monitoringApiKey = isset($_POST['monitoringApiKey']) ? $_POST['monitoringApiKey'] : '';
    
    $loggingEnabled = isset($_POST['loggingEnabled']) ? true : false;
    $logLevel = isset($_POST['logLevel']) ? $_POST['logLevel'] : 'debug';
    
    // Save the settings to a configuration file or database
    // You can adapt this code to store the settings in your preferred format
    
    // Example: Saving settings to a JSON file
    $settings = [
        'cacheEnabled' => $cacheEnabled,
        'cacheDuration' => $cacheDuration,
        'compressionEnabled' => $compressionEnabled,
        'compressionLevel' => $compressionLevel,
        'imageCompressionLevel' => $imageCompressionLevel,
        'imageFormat' => $imageFormat,
        'cdnEnabled' => $cdnEnabled,
        'cdnEndpoint' => $cdnEndpoint,
        'cacheSize' => $cacheSize,
        'timeout' => $timeout,
        'loadBalancingEnabled' => $loadBalancingEnabled,
        'loadBalancingAlgorithm' => $loadBalancingAlgorithm,
        'monitoringApiKey' => $monitoringApiKey,
        'loggingEnabled' => $loggingEnabled,
        'logLevel' => $logLevel
    ];
    
    
    // Redirect the admin to a success page or display a success message
    header('Location: success.php');
    exit;
}
?>