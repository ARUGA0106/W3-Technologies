<?php include 'db.php'; ?>

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

    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    
<!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center"> 
        <img src="assets/img/logo.png" alt="" class="avatar rounded-circle">
        <h1 class="d-flex align-items-center">DITAQ Center</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php"><span>Home</span></a></li>
          <li><a href="map.php"<span>Maps</a></li>
          <li class="dropdown"><a href="visual.php"><span>Reports</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="visual.php">Visualized data</a></li>
              <li><a href="report.php">Data reports</a></li>
              <li><a href="">Add your Sensor</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="report.php"><span>About us</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="about.html">About DITAQ Center</a></li>
              <li><a href="">Report Extreme Pollution</a></li>
              <li><a href="">Contact Us</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </header><!-- End Header -->
  
    <main id="main">
        <!-- ======= Air Quality Data Section ======= -->
        <section id="air-quality-data" class="section">
            <div class="container">
                <h2>The visualized Data from Real time sensor collected after every hour</h2>
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
                    
                    // Fetch data and store in arrays for JavaScript
                    $pollutants = [];
                    $sensors = [];
                    $standardConcentrations = [];
                    $actualConcentrations = [];
                    $aqhis = [];
                    $states = [];
                    
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

                            $pollutants[] = $row["pollutant_name"];
                            $sensors[] = $row["sensor_name"];
                            $standardConcentrations[] = $row["standard_concentration"];
                            $actualConcentrations[] = $row["actual_concentration"];
                            $aqhis[] = $row["aqhi"];
                            $states[] = $row["state"];
                        }
                    } else {
                        echo "<tr><td colspan='6'>No data available</td></tr>";
                    }
                    ?>
					
                </table>
                <!-- Line Chart for Actual Concentrations -->
                <div>
                    <canvas id="lineChart"></canvas>
                </div>
                <!-- Bar Chart for Pollutant Variations -->
                <div>
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </section><!-- End Air Quality Data Section -->
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="footer-content">
            <div class="footer-legal">
                <div class="container">
                    <div class="copyright">
                        &copy; <?php echo date('Y'); ?> Copyright <strong>DIT Environmental monitoring department.</strong> All Rights Reserved
                    </div>
                    <div class="credits">
                        Designed by <a href="#">Group 2, BENG21 ETE.</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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

    <!-- Chart.js Visualization Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pollutants = <?php echo json_encode($pollutants); ?>;
            const actualConcentrations = <?php echo json_encode($actualConcentrations); ?>;
            const standardConcentrations = <?php echo json_encode($standardConcentrations); ?>;
            
            // Line Chart
            const lineCtx = document.getElementById('lineChart').getContext('2d');
            new Chart(lineCtx, {
                type: 'line',
                data: {
                    labels: pollutants,
                    datasets: [{
                        label: 'Actual Concentration (mg/m³)',
                        data: actualConcentrations,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Pollutant Name'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Concentration (mg/m³)'
                            }
                        }
                    }
                }
            });

            // Bar Chart
            const barCtx = document.getElementById('barChart').getContext('2d');
            new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: pollutants,
                    datasets: [{
                        label: 'Standard Concentration (mg/m³)',
                        data: standardConcentrations,
                        backgroundColor: 'rgba(153, 102, 255, 0.6)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Actual Concentration (mg/m³)',
                        data: actualConcentrations,
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Pollutant Name'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Concentration (mg/m³)'
                            }
                        }
                    }
                }
            });
        });
    </script>

</body>

</html>
