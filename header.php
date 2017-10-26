<!DOCTYPE html>
<?php
session_start();
?>
<html>
  <head>
    <!-- This project was created by Nicholas Griffin -->
    <!-- https://nicholasgriffin.co.uk -->
    <title>Just a PHP Sessions Login System</title>
  </head>
  <body>
      <header>
          <nav>
              <div class="main_header_wrapper">
                <div class="nav-logo">
                  THIS IS A HEADER
                </div>
                <div class="nav-links">
                  <ul class="nav">
                    <li class="link">A LINK</li>
                    <li class="link">A LINK</li>
                    <li class="link">A LINK</li>
                    <li class="link">A LINK</li>
                  </ul>
                </div>
                <div class="account-info">
                  <span class="hello_world">
                    <?php
                      echo $_SESSION['username'];
                    ?>
                  </span>
                </div>
            </div>
          </nav>
      </header>