<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neighborhood Clinic | Hospital Management System</title>
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">
    <!-- Google Fonts: Open Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Open Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Open Sans', Arial, sans-serif;
            background: linear-gradient(180deg, rgba(32,86,167,0.7) 0%, rgba(70,130,199,0.5) 100%), url('assets/images/bannerone.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            color: #23406c;
            line-height: 1.5;
            font-size: 100px;
        }
        .header-area {
            background: #2056a7;
            color: #fff;
            box-shadow: 0 2px 8px rgba(32,86,167,0.08);
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 10px;
        }
        #logo {
            padding: 12px 0;
            font-family: 'Open Sans', Arial, sans-serif;
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: 1px;
        }
        #logo a {
            color: #fff;
            text-decoration: none;
        }
        .nav-menu {
            list-style: none;
            display: flex;
            gap: 30px;
            margin: 0;
            padding: 0;
        }
        .nav-menu li {
            display: inline-block;
        }
        .nav-menu a {
            color: #fff;
            font-weight: 600;
            text-decoration: none;
            padding: 12px 0;
            font-size: 1.3rem;
            letter-spacing: 0.5px;
            transition: color 0.2s;
        }
        .nav-menu a:hover, .menu-active a {
            color: #d7dedbff;
        }
        .banner-area {
            background: linear-gradient(180deg, rgba(32,86,167,0.7) 0%, rgba(70,130,199,0.5) 100%), url('assets/images/bannerone.jpg') no-repeat center center;
            background-size: cover;
            color: #fff;
            padding: 48px 0 32px 0;
            border-radius: 0 0 24px 24px;
            box-shadow: 0 4px 24px rgba(32,86,167,0.08);
            margin-bottom: 24px;
        }
        .banner-area h4 {
            font-family: 'Open Sans', Arial, sans-serif;
            font-size: 2rem;
            font-weight: 500;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }
        .banner-area h1 {
            font-family: 'Arial', Arial, sans-serif;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 14px;
            line-height: 1.1;
        }
        .banner-area p {
            font-size: 1rem;
            font-weight: 400;
            margin-bottom: 0;
            max-width: 500px;
        }
        .card-group {
            display: flex;
            gap: 16px;
            margin-top: 28px;
            flex-wrap: wrap;
        }
        .info-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(32,86,167,0.07);
            padding: 20px 14px;
            flex: 1 1 220px;
            min-width: 220px;
            text-align: center;
            transition: box-shadow 0.2s;
            color: #23406c;
        }
        .info-card:hover {
            box-shadow: 0 4px 24px rgba(32,86,167,0.15);
        }
        .info-card h3 {
            font-family: 'Open Sans', Arial, sans-serif;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: #2056a7;
        }
        .info-card p {
            font-size: 1rem;
            color: #23406c;
            margin-bottom: 0;
        }
        @media (max-width: 900px) {
            .card-group {
                flex-direction: column;
                gap: 12px;
            }
            .banner-area h1 {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header Area Starts -->
    <header class="header-area">
        <div class="container" style="display: flex; align-items: center; justify-content: space-between;">
            <div id="logo">
                <a href="index.php">Neighborhood Clinic</a>
            </div>
            <nav>
                <ul class="nav-menu">
                    <li class="menu-active"><a href="index.php">Home</a></li>
                    <li><a href="backend/doc/index.php">Doctor's Login</a></li>
                    <li><a href="backend/admin/index.php">Administrator Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- Banner Area Starts -->
    <section class="banner-area">
        <div class="container">
            <h4>Personalized care for every neighbor</h4>
            <h1>Welcome to Your Local Clinic</h1>
            <p>Experience healthcare that puts you first. Our dedicated team offers modern medical services with a friendly, community-focused approach. From routine checkups to urgent care, we’re here for you and your family every step of the way.</p>
            <div class="card-group">
                <div class="info-card">
                    <h3>Family Medicine</h3>
                    <p>Comprehensive care for all ages, from children to seniors.</p>
                </div>
                <div class="info-card">
                    <h3>Walk-In Services</h3>
                    <p>No appointment needed for minor illnesses and injuries.</p>
                </div>
                <div class="info-card">
                    <h3>Online Appointments</h3>
                    <p>Book your visit easily and securely through our portal.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

</body>
</html>