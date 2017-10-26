<?php
include_once 'header.php';
?>
    <section>
      <div class="main_page_wrapper">
          <h1>Signup</h2>
          <form action="includes/signup_conn.php" method="POST">
              <input type="text" name="first" placeholder="First Name">
              <input type="text" name="last" placeholder="Last Name">
              <input type="text" name="email" placeholder="E-mail">
              <input type="text" name="uid" placeholder="Username">
              <input type="text" name="pwd" placeholder="Password">
              <button type="submit" name="submit">Register</button>
          </form>
      </div>
    </section>
    <?php
      include_once 'footer.php'
    ?>
  </body>
</html>