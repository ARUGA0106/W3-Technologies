<?php include 'db.php';  
include('head.php'); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Data Page</title>

    <!-- Favicons -->
    <link href="assets/img/logo.png" rel="icon" alt="" class="avatar rounded-circle">
    <link href="assets/img/logo.png" rel="icon" alt="" class="avatar rounded-circle">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>

            <nav id="navbar" class="navbar">
                <a href="index.php"><span>Home</span></a>
                <a href="status.php"><span>Status</span></a>
                <a href="page/Auditor.php">Daily Audit</a>
                <a href="https://aqicn.org/map/world">Pollution Maps</a>
                <a href="contact.php">Contact</a>
                <a href="report.php">Report Extreme Pollution</a>
            </nav>
        </div>
    </header><!-- End Header -->
	<body>
	<!-- ======= Air Quality Data Section ======= -->
    <section id="air-quality-data" class="section">
        <div class="container">
            <h1>Air Quality Data</h1>
            <table border="1">
                <tr>
                    <th>Pollutant Name</th>
                    <th>Sensor Name</th>
                    <th>Standard Concentration (mg/m³ for 15 min)</th>
                    <th>Actual Concentration</th>
                    <th>AQHI</th>
                    <th>State</th>
                </tr>
                <?php
                // SQL query to select data from your table
                $sql = "SELECT * FROM sensor_readings";

                // Execute the query
                $result = $conn->query($sql);

                // Check if there are rows returned
                if ($result->num_rows > 0) {
                    // Loop through each row of data
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["pollutant_name"] . "</td>";
                        echo "<td>" . $row["sensor_name"] . "</td>";
                        echo "<td>" . $row["standard_concentration"] . "</td>";
                        echo "<td>" . $row["actual_concentration"] . "</td>";
                        echo "<td>" . $row["aqhi"] . "</td>";
                        echo "<td>" . $row["state"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No data available</td></tr>";
                }
                ?>
            </table>
        </div>
    </section><!-- End Air Quality Data Section -->
	</body>
        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer">

            <div class="footer-content">
                <div class="footer-legal">
                    <div class="container">
                        <div class="copyright">
                            &copy; <?php echo date('Y'); ?> Copyright <strong>DIT Environmental
                                monitoring department.</strong> All Rights Reserved</p>
                        </div>
                        <div class="credits">
                            Designed by <a href="#">Group 2, BENG21 ETE.</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <div id="preloader"></div>

        <!-- Vendor JS Files -->
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>

    </body>

    </html>
