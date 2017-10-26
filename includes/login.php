<?php
if (isset($SESSION[u_id]) ) {
  echo '<form action="includes/logout.php" method="POST">
  <button type="submit" name="submit_logout"></button>
  </form>';
} else {
  echo '<form action="includes/login_conn.php" method="POST">
  <input type="text" nam="uid" placeholder="Username">
  <input type="password" nam="pwd" placeholder="Password">
  <button type="submit" name=="submit_login">Login</button>
  </form>
  <div class="block_register">
  <a href="signup.php">Register Here</a>
  </div>';
}