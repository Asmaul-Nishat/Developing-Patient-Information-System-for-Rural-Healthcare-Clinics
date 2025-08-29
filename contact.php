<?php
session_start();

// --- DB Connection (adjust db name as per your project) ---
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'system-database'; // <- change to your healthcare system db

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables and error messages
$name = $email = $subject = $message = "";
$nameErr = $emailErr = $subjectErr = $messageErr = "";
$successMsg = "";
$hasError = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Name
    if (empty(trim($_POST["name"]))) {
        $nameErr = "Full Name is required.";
        $hasError = true;
    } else {
        $name = htmlspecialchars(trim($_POST["name"]));
    }

    // Email
    if (empty(trim($_POST["email"]))) {
        $emailErr = "Email Address is required.";
        $hasError = true;
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format.";
        $hasError = true;
    } else {
        $email = htmlspecialchars(trim($_POST["email"]));
    }

    // Subject
    if (empty(trim($_POST["subject"]))) {
        $subjectErr = "Subject is required.";
        $hasError = true;
    } else {
        $subject = htmlspecialchars(trim($_POST["subject"]));
    }

    // Message
    if (empty(trim($_POST["message"]))) {
        $messageErr = "Message is required.";
        $hasError = true;
    } else {
        $message = htmlspecialchars(trim($_POST["message"]));
    }

    // Save to DB
    if (!$hasError) {
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . htmlspecialchars($conn->error));
        }
        $stmt->bind_param("ssss", $name, $email, $subject, $message);
        if ($stmt->execute()) {
            $successMsg = "Thank you, your message has been sent successfully. Our healthcare team will contact you soon.";
            $name = $email = $subject = $message = "";
        } else {
            die("Failed to save your message. Please try again.");
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Contact Us - Rural Healthcare System</title>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet" />
  <style>
    :root {
      --black: #000000;
      --white: #f9f9f9;
      --gray: #dddddd;
      --input-border: #999999;
      --radius: 10px;
      --shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
      --primary-color: #3a8d63; /* Healthcare green */
      --label-text: #444;
      --error-text: red;
      --text-color: #222;
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'Merriweather', serif;
      background-color: var(--white);
      color: var(--text-color);
      min-height: 100vh;
      padding-top: 70px;
    }
    nav {
      position: fixed; top: 0; left: 0; width: 100%;
      background-color: var(--white);
      box-shadow: var(--shadow);
      display: flex; justify-content: space-between; align-items: center;
      padding: 0.8rem 2rem; z-index: 1000;
      border-bottom: 1px solid var(--gray);
    }
    .logo {
      font-weight: 700; font-size: 1.5rem; color: var(--primary-color);
      font-family: 'Merriweather', serif;
      cursor: pointer; text-decoration: none;
    }
    .nav-links {
      display: flex; gap: 2rem; font-size: 1rem; font-weight: 600;
    }
    .nav-links a {
      text-decoration: none; color: var(--black);
      padding: 0.3rem 0.5rem; border-radius: var(--radius);
      transition: all 0.3s ease;
    }
    .nav-links a:hover {
      color: var(--primary-color);
      background-color: rgba(58,141,99,0.15);
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
      font-size: 2.5rem;
      color: var(--primary-color);
      text-align: center;
      margin-bottom: 1rem;
    }
    hr {
      border: none;
      height: 3px;
      background-color: var(--primary-color);
      width: 100px;
      margin: 0 auto 2rem auto;
      border-radius: var(--radius);
    }
    form { display: flex; flex-direction: column; gap: 1.2rem; }
    label { font-weight: 600; color: var(--label-text); font-size: 1.1rem; }
    input, textarea {
      padding: 0.75rem 1rem; font-size: 1rem;
      border: 1.5px solid var(--input-border);
      border-radius: var(--radius);
      font-family: 'Merriweather', serif;
      transition: border-color 0.3s ease;
    }
    input:focus, textarea:focus {
      outline: none; border-color: var(--primary-color);
      box-shadow: 0 0 5px rgba(58,141,99,0.4);
    }
    textarea { min-height: 120px; }
    button {
      align-self: flex-start; background-color: var(--primary-color);
      color: var(--white); border: none; padding: 0.8rem 2rem;
      font-size: 1.1rem; font-weight: 700; border-radius: var(--radius);
      cursor: pointer; transition: background 0.3s ease;
    }
    button:hover { background-color: #2d6d4d; }
    .error { color: var(--error-text); font-size: 0.9rem; }
    .success-msg {
      background-color: #d4edda; color: #155724;
      border: 1px solid #c3e6cb; padding: 1rem;
      border-radius: var(--radius); text-align: center;
      margin-bottom: 1.5rem;
    }
    .footer {
      margin-top: 3rem; text-align: center;
      font-size: 0.9rem; color: var(--gray); font-style: italic;
    }
    @media (max-width: 700px) {
      nav { padding: 0.6rem 1rem; }
      .nav-links { gap: 1rem; font-size: 0.9rem; }
      .container { padding: 2rem 1.5rem; }
      h1 { font-size: 2rem; }
    }
  </style>
</head>
<body>

  <nav>
    <a href="index.php" class="logo">Rural HealthCare</a>
    <div class="nav-links">
      <a href="index.php">Home</a>
      <a href="about.php">About</a>
      <a href="appointment.php">Appointment</a>
      <a href="login.php">Login</a>
    </div>
  </nav>

  <div class="container">
    <h1>Contact Us</h1>
    <hr />

    <?php if ($successMsg): ?>
      <div class="success-msg"><?= $successMsg ?></div>
    <?php endif; ?>

    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      <label for="name">Full Name</label>
      <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>" required>
      <?php if ($nameErr): ?><div class="error"><?= $nameErr ?></div><?php endif; ?>

      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required>
      <?php if ($emailErr): ?><div class="error"><?= $emailErr ?></div><?php endif; ?>

      <label for="subject">Subject</label>
      <input type="text" id="subject" name="subject" value="<?= htmlspecialchars($subject) ?>" required>
      <?php if ($subjectErr): ?><div class="error"><?= $subjectErr ?></div><?php endif; ?>

      <label for="message">Message</label>
      <textarea id="message" name="message" required><?= htmlspecialchars($message) ?></textarea>
      <?php if ($messageErr): ?><div class="error"><?= $messageErr ?></div><?php endif; ?>

      <button type="submit">Send Message</button>
    </form>

    <div class="footer">© 2025 Rural HealthCare System. All rights reserved.</div>
  </div>

</body>
</html>
