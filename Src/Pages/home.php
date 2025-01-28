<?php include ( "inc/connect.inc.php" ); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Foodzy</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
	    
        <!-- Favicon -->
	    <link href="img/restaurant/favicon.ico" rel="icon">
	    <link rel="apple-touch-icon" sizes="180x180" href="img/restaurant/apple-touch-icon.png">
	    <link rel="icon" type="image/png" sizes="32x32" href="img/restaurant/favicon-32x32.png">
	    <link rel="icon" type="image/png" sizes="16x16" href="img/restaurant/favicon-16x16.png">
	    <link rel="manifest" href="img/restaurant/site.webmanifest">
        
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <?php
        // Call the stored procedure
        $result = pg_query($conn, "SELECT * FROM sample_menu;");

        if (!$result) {
            echo "Failed to execute the query: " . pg_last_error($conn);
            exit;
        }

        // Display the result
        while ($row = pg_fetch_assoc($result)) {
            echo '  <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu-1.jpg" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>'. $row['food_items'] .'</span>
                                                <span class="text-primary">$'. $row['price'] .'</span>
                                            </h5>
                                            <small class="fst-italic">'. $row['description'] .'</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }

        // Close the connection
        pg_close($conn);
    ?>
    </body>
</html>