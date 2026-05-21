<div class="py-1 px-2 topnav"> 
        
        <?php 
         if (!empty($_SESSION['Name'])) {
             echo htmlspecialchars(string: " Welcome!!  ". $_SESSION['Name']);
         } else {
             echo "Welcome, Guest!";

        }
        ?>
    
</div>