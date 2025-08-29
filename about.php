<?php
// about.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>About Us - Rural Healthcare Information System</title>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet" />
  <style>
    :root {
      --black: #000000;
      --white: #f0f0f0;
      --gray: #dddddd;
      --input-border: #999999;
      --radius: 10px;
      --shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
      --primary-color: #2b8a3e; /* Green for healthcare */
      --label-text: #666666;
      --text-color: #222222;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Merriweather', serif;
      background-color: var(--white);
      color: var(--text-color);
      min-height: 100vh;
      padding-top: 70px; /* space for fixed navbar */
    }

    nav {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background-color: var(--white);
      box-shadow: var(--shadow);
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.8rem 2rem;
      z-index: 1000;
      border-bottom: 1px solid var(--gray);
    }

    .logo {
      font-weight: 700;
      font-size: 1.5rem;
      color: var(--primary-color);
      font-family: 'Merriweather', serif;
      cursor: pointer;
      user-select: none;
      text-decoration: none;
    }

    .nav-links {
      display: flex;
      gap: 2rem;
      font-size: 1rem;
      font-weight: 600;
    }

    .nav-links a {
      text-decoration: none;
      color: var(--black);
      transition: color 0.3s ease;
      padding: 0.3rem 0.5rem;
      border-radius: var(--radius);
    }

    .nav-links a:hover,
    .nav-links a:focus {
      color: var(--primary-color);
      background-color: rgba(43, 138, 62, 0.15);
    }

    .container {
      max-width: 900px;
      background-color: var(--white);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 3rem 4rem;
      border: 1px solid var(--gray);
      margin: 0 auto 4rem auto;
    }

    h1 {
      font-size: 2.75rem;
      color: var(--primary-color);
      text-align: center;
      margin-bottom: 1rem;
      font-weight: 700;
    }

    hr {
      border: none;
      height: 3px;
      background-color: var(--primary-color);
      width: 100px;
      margin: 0 auto 2rem auto;
      border-radius: var(--radius);
    }

    .about-image {
      display: block;
      max-width: 100%;
      height: auto;
      border-radius: var(--radius);
      margin: 0 auto 2.5rem auto;
      box-shadow: 0 4px 15px rgba(43, 138, 62, 0.4);
    }

    p {
      font-size: 1.125rem;
      line-height: 1.7;
      margin-bottom: 1.75rem;
      text-align: justify;
    }

    strong {
      color: var(--primary-color);
    }

    ul {
      list-style-type: disc;
      padding-left: 1.5rem;
      margin-bottom: 1.75rem;
      color: var(--label-text);
    }

    ul li {
      margin-bottom: 0.7rem;
      font-size: 1.1rem;
    }

    .highlight {
      background-color: var(--primary-color);
      color: var(--white);
      padding: 0.15rem 0.5rem;
      border-radius: 4px;
      font-weight: 600;
    }

    a {
      color: var(--primary-color);
      text-decoration: none;
      border-bottom: 1px solid var(--primary-color);
      transition: color 0.3s ease, border-color 0.3s ease;
    }

    a:hover {
      color: #237032;
      border-color: #1c5a29;
    }

    .footer {
      margin-top: 3rem;
      text-align: center;
      font-size: 0.9rem;
      color: var(--gray);
      font-style: italic;
    }

    @media (max-width: 700px) {
      nav {
        padding: 0.6rem 1rem;
      }

      .nav-links {
        gap: 1rem;
        font-size: 0.9rem;
      }

      .container {
        padding: 2rem 1.5rem;
      }

      h1 {
        font-size: 2rem;
      }

      p, ul li {
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>

  <nav>
    <a href="index.php" class="logo">HealthSys</a>
    <div class="nav-links">
      <a href="index.php">Home</a>
      <a href="doctor.php">Doctors</a>
      <a href="services.php">Services</a>
      <a href="appointment.php">Appointment</a>
      <a href="login.php">Login</a>
    </div>
  </nav>

  <div class="container">
    <h1>About Us</h1>
    <hr />

    <img
      src="uploads/image copy 11.png"
      alt="Rural Healthcare System"
      class="about-image"
    />

    <p>
      Welcome to the <strong class="highlight">Rural Healthcare Information System</strong>, a platform designed to improve the delivery of healthcare services in underserved rural communities. Our system bridges the gap between patients, healthcare providers, and clinics by offering a centralized digital solution for medical records, appointments, and reporting.
    </p>

    <p>Our mission is to provide a <strong>reliable, user-friendly, and accessible system</strong> that allows rural clinics to:</p>
    <ul>
      <li>Maintain accurate and secure <strong>patient records</strong></li>
      <li>Streamline <strong>appointment scheduling</strong> and follow-ups</li>
      <li>Enable <strong>efficient communication</strong> between patients and healthcare providers</li>
      <li>Provide <strong>health data analytics</strong> for better decision-making</li>
    </ul>

    <p>
      By digitizing healthcare processes, we aim to reduce delays, improve diagnosis accuracy, and support rural healthcare workers in managing resources effectively. Our platform empowers patients with access to their own medical history and ensures continuity of care even in remote areas.
    </p>

    <p>
      Thank you for being part of our mission to transform rural healthcare. Together, we can make healthcare <strong>accessible, affordable, and efficient</strong> for everyone.
    </p>

    <div class="footer">© 2025 Rural Healthcare Information System. All rights reserved.</div>
  </div>

</body>
</html>
