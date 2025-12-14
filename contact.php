<?php
// contact.php - Contact Us page
require_once './assets/includes/header.php';
require_once './PHPMailer-master/src/Exception.php';
require_once './PHPMailer-master/src/PHPMailer.php';
require_once './PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone'] ?? '');
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);
    $inquiry_type = trim($_POST['inquiry_type'] ?? 'general');
    
    // Validate inputs
    $errors = array();
    if (empty($name)) $errors[] = 'Name is required';
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required';
    if (empty($subject)) $errors[] = 'Subject is required';
    if (empty($message)) $errors[] = 'Message is required';
    
    if (empty($errors)) {
        // Insert into database
        try {
            $stmt = $pdo->prepare("INSERT INTO contacts (name, email, phone, subject, message, inquiry_type, created_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");
            $stmt->execute([$name, $email, $phone, $subject, $message, $inquiry_type]);
            
            // Send email using PHPMailer
            $mail = new PHPMailer(true);
            
            try {
                // SMTP Configuration
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 465;
                $mail->SMTPSecure = 'ssl';
                $mail->SMTPAuth = true;
                $mail->Username = 'elevatrunkmedia@gmail.com';
                $mail->Password = 'mmdr kqqt pxqw vyrt';
                
                // Recipients
                $mail->setFrom($email, $name);
                $mail->addAddress('elevatrunkmedia@gmail.com');
                $mail->addReplyTo($email, $name);
                
                // Content
                $mail->isHTML(true);
                $mail->Subject = "Eleva Trunk Media - New Inquiry: " . ucfirst($inquiry_type);
                
                $mail->Body = '
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="utf-8">
                    <title>Eleva Trunk Media - New Contact Inquiry</title>
                    <style>
                        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; }
                        .header { background-color: #df448a; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
                        .content { padding: 25px; background-color: #f9f9f9; border-left: 1px solid #ddd; border-right: 1px solid #ddd; }
                        .details { background: #fff; padding: 20px; border-radius: 8px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
                        .details p { margin: 8px 0; }
                        .label { font-weight: bold; color: #333; display: inline-block; width: 120px; }
                        .footer { padding: 15px; text-align: center; font-size: 12px; color: #777; background-color: #f1f1f1; border-radius: 0 0 8px 8px; border: 1px solid #ddd; }
                    </style>
                </head>
                <body>
                    <div class="header">
                        <h2 style="color: white; margin: 0;">New Contact Inquiry</h2>
                    </div>
                    <div class="content">
                        <div class="details">
                            <p><span class="label">Inquiry Type:</span> '.ucfirst(htmlspecialchars($inquiry_type)).'</p>
                            <p><span class="label">From:</span> '.htmlspecialchars($name).'</p>
                            <p><span class="label">Email:</span> '.htmlspecialchars($email).'</p>
                            <p><span class="label">Phone:</span> '.htmlspecialchars($phone).'</p>
                            <p><span class="label">Subject:</span> '.htmlspecialchars($subject).'</p>
                        </div>
                        <div class="details">
                            <h3 style="margin-top: 0;">Message:</h3>
                            <p>'.nl2br(htmlspecialchars($message)).'</p>
                        </div>
                    </div>
                    <div class="footer">
                        <p>&copy; '.date('Y').' Eleva Trunk Media. All rights reserved.</p>
                    </div>
                </body>
                </html>';
                
                $mail->AltBody = "Eleva Trunk Media - New Contact Inquiry\n\n".
                                 "Inquiry Type: ".ucfirst($inquiry_type)."\n".
                                 "From: ".$name."\n".
                                 "Email: ".$email."\n".
                                 "Phone: ".$phone."\n".
                                 "Subject: ".$subject."\n\n".
                                 "Message:\n".$message;
                
                $mail->send();
                $success = true;
            } catch (Exception $e) {
                error_log("Email Error: {$mail->ErrorInfo}");
                $success = true; // Still show success since it's in database
            }
            
        } catch (PDOException $e) {
            $errors[] = 'Error submitting form. Please try again.';
            error_log("Database Error: " . $e->getMessage());
        }
    }
}
?>

    <!-- Page Header -->
    <section class="page-header py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center animate__animated animate__fadeIn">
                    <h1 class="fw-bold">Contact <span class="text-primary">Us</span></h1>
                    <nav aria-label="breadcrumb" class="d-flex justify-content-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0 animate__animated animate__fadeInLeft">
                    <h2 class="fw-bold mb-4">Get In <span class="text-primary">Touch</span></h2>
                    <p class="lead">Have a question or want to work with us? Fill out the form and we'll get back to you as soon as possible.</p>
                    
                    <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php foreach ($errors as $error) : ?>
                            <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (isset($success) && $success) : ?>
                    <div class="alert alert-success">
                        Thank you for your message! We'll get back to you soon.
                    </div>
                    <?php endif; ?>
                    
                    <form action="contact.php" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>" required>
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required>
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Your Phone" value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>">
                                    <label for="phone">Your Phone (Optional)</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <select class="form-select" id="inquiry_type" name="inquiry_type">
                                        <option value="general" <?= (isset($_POST['inquiry_type']) && $_POST['inquiry_type'] == 'general') ? 'selected' : '' ?>>General Inquiry</option>
                                        <option value="services" <?= (isset($_POST['inquiry_type']) && $_POST['inquiry_type'] == 'services') ? 'selected' : '' ?>>Services Inquiry</option>
                                        <option value="careers" <?= (isset($_POST['inquiry_type']) && $_POST['inquiry_type'] == 'careers') ? 'selected' : '' ?>>Careers</option>
                                        <option value="partnership" <?= (isset($_POST['inquiry_type']) && $_POST['inquiry_type'] == 'partnership') ? 'selected' : '' ?>>Partnership</option>
                                    </select>
                                    <label for="inquiry_type">Inquiry Type</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" value="<?= isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : '' ?>" required>
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" id="message" name="message" placeholder="Your Message" style="height: 150px" required><?= isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '' ?></textarea>
                                    <label for="message">Your Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg px-4">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 animate__animated animate__fadeInRight">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4 p-lg-5">
                            <h3 class="fw-bold mb-4">Contact <span class="text-primary">Information</span></h3>
                            <!-- <div class="d-flex mb-4">
                                <div class="icon-box bg-primary text-white me-3">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1">Our Location</h5>
                                    <p class="mb-0 text-muted">123 Media Street, Creative City, CA 90210</p>
                                </div>
                            </div> -->
                            <div class="d-flex mb-4">
                                <div class="icon-box bg-primary text-white me-3 flex-shrink-0">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div>
                                    <h5 class="mb-2">Call Us</h5>
                                    <p class="mb-1 text-muted">Naitri Santoki</p>
                                    <p class="mb-0 text-muted"><a href="tel:+918141744419" class="text-muted text-decoration-none">+91 8141744419</a></p>
                                </div>
                            </div>
                            <div class="d-flex mb-4">
                                <div class="icon-box bg-primary text-white me-3 flex-shrink-0">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h5 class="mb-2">Email Us</h5>
                                    <p class="mb-0 text-muted"><a href="mailto:elevatrunkmedia@gmail.com" class="text-muted text-decoration-none">elevatrunkmedia@gmail.com</a></p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="icon-box bg-primary text-white me-3 flex-shrink-0">
                                    <i class="fas fa-share-alt"></i>
                                </div>
                                <div>
                                    <h5 class="mb-3">Follow Us</h5>
                                    <div class="social-links d-flex gap-3">
                                        <a href="https://www.facebook.com/profile.php?id=61577105214095" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary btn-sm"><i class="fab fa-facebook-f"></i></a>
                                        <a href="https://www.instagram.com/elevatrunkmedia?igsh=bnYzMDl2ZnhpMDB6&utm_source=qr" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary btn-sm"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <!-- <section class="py-0">
        <div class="container-fluid px-0">
            <div class="ratio ratio-21x9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.215256836702!2d-73.9878449241644!3d40.74844097138972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a163!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1689876543210!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section> -->

<?php
require_once './assets/includes/footer.php';
?>
