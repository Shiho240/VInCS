<nav class="top-bar">
  <ul class="title-area">
    <!-- Title Area -->
    <li class="name">
      <h1><a href="index.php">VInCS </a></h1>
    </li>
    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>
  <section class="top-bar-section">
    <!-- Left Nav Section -->
    <ul class="right">
    	<li class="divider"></li>
     	 <li class="active"><a <?php if($cur_page == "home") echo "class='currentpage'"; ?> href="index.php">Residents</a></li>
     	 <li class="divider"></li>
      <li class="active"><a <?php if($cur_page == "activities") echo "class='currentpage'"; ?> href="activities.php">Activities</a></li>
      <li class="divider"></li>
      <li class="active"><a <?php if($cur_page == "schedule") echo "class='currentpage'"; ?> href="schedule.php">Doctor's Appointments</a></li>
		<li class="divider"></li>
      <li class="active"><a <?php if($cur_page == "contact") echo "class='currentpage'"; ?> href="contact.php">Other</a></li>
    </ul>
 </section>
 </nav>
 