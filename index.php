<?php 
// Include the database connection file
include('db_config.php'); 

// Fetch user personal information from the database
$user_query = "SELECT * FROM user_info LIMIT 1";
$user_result = mysqli_query($conn, $user_query);
$user = mysqli_fetch_assoc($user_result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sulaiman | Portfolio</title>
    <!-- Use versioning to force CSS refresh -->
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>

    <header class="header">
        <a href="#home" class="logo">Sulaiman <span>Alsarhayd</span></a>
        
        <i class="bx bx-menu" id="menu-icon"></i>
        
        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#services">Skills</a>
            <a href="#projects">Projects</a>
            <a href="#contact">Contact</a>
        </nav>

        <!-- Container for Dark Mode and Contact Button -->
        <div class="header-actions" style="display: flex; align-items: center; gap: 1.5rem;">
            <!-- Dark/Light Mode Icon -->
            <i class='bx bx-moon' id="darkMode-icon" style="font-size: 2.4rem; color: var(--text-color); cursor: pointer;"></i>
            
            <button class="gradient-btn">
                <a href="#contact" style="color: black; font-weight: 600;">Contact Me</a>
            </button>
        </div>
    </header>

    <!-- Home Section -->
    <section class="home" id="home">
        <div class="home-content">
            <h1>Hi, It's <span>Sulaiman</span></h1>
            <h3>I'm a <span><?php echo $user['title']; ?></span></h3>
            <p><?php echo $user['bio']; ?></p>

            <div class="social-icons">
                <a href="https://github.com/Sul-SWE"><i class="bx bxl-github"></i></a>
                <a href="https://wa.me/966500819045"><i class="bx bxl-whatsapp"></i></a>
                <a href="https://www.linkedin.com/in/sulaiman-alsarhayd/"><i class="bx bxl-linkedin"></i></a>
                <a href="mailto:s.alsarhayd@gmail.com"><i class="bx bxs-envelope"></i></a>           
            </div>
            <div class="btn-group">
                <a href="mailto:s.alsarhayd@gmail.com" class="btn">Hire</a>
                <a href="#contact" class="btn">Contact</a>
            </div>
        </div>

        <div class="home-img">
            <img src="imges\simg.jpg" alt="Profile Image">
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <div class="about-img">
            
        </div>
        <div class="about-content">
            <h2>About <span>Me</span></h2>
            <p>Bachelor of <?php echo $user['title']; ?> GPA: <?php echo $user['gpa']; ?></p>
            <p class="Time"><?php echo $user['expected_grad']; ?></p>
            <p><?php echo $user['university']; ?></p>
            <a href="#" class="btn">Read More</a>
        </div>
    </section>

    <!-- Skills Section (Dynamic) -->
    <section class="services" id="services">
        <h2 class="heading">Skills</h2>
        <div class="services-container">
            <?php
            $skills_query = "SELECT * FROM skills";
            $skills_result = mysqli_query($conn, $skills_query);
            while($skill = mysqli_fetch_assoc($skills_result)) {
            ?>
                <div class="service-box">
                    <div class="service-info">
                        <i class="bx <?php echo $skill['icon']; ?>"></i>
                        <h4><?php echo $skill['skill_name']; ?></h4>
                        <p><?php echo $skill['description']; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <!-- Projects Section (Dynamic) -->
    <section class="projects" id="projects">
        <h2 class="heading">Projects</h2>
        <div class="projects-box">
            <?php
            $projects_query = "SELECT * FROM projects";
            $projects_result = mysqli_query($conn, $projects_query);
            while($proj = mysqli_fetch_assoc($projects_result)) {
            ?>
                <div class="project-card">
                    <img src="<?php echo $proj['image_path']; ?>" alt="Project Image">
                    <h3><?php echo $proj['title']; ?></h3>
                    <p><?php echo $proj['description']; ?></p>
                    <div class="btn"><a href="<?php echo $proj['github_link']; ?>" >Review Project</a></div>
                </div>
            <?php } ?>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <h2 class="heading">Contact <span>Me</span></h2>
        
        <form action="send_contact.php" method="POST">
            <div class="input-group">
                <div class="input-box">
                    <input type="text" name="full_name" placeholder="Full Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-box">
                    <input type="text" name="subject" placeholder="Subject" style="width: 100%;">
                </div>
            </div>

            <div class="input-group-2">
                <textarea name="message" cols="30" rows="10" placeholder="Your Message" required></textarea>
                <input type="submit" name="submit" value="Send Message" class="btn">
            </div>
        </form>
    </section>

    <footer class="footer">
        <div class="social-icons">
            <a href="https://github.com/Sul-SWE"><i class="bx bxl-github"></i></a>
            <a href="https://wa.me/966500819045"><i class="bx bxl-whatsapp"></i></a>
            <a href="https://www.linkedin.com/in/sulaiman-alsarhayd/"><i class="bx bxl-linkedin"></i></a>
            <a href="mailto:s.alsarhayd@gmail.com"><i class="bx bxs-envelope"></i></a>     
            <p class="copyright">&copy; <?php echo date("Y"); ?> Suliman Alsarhayd | All rights reserved.</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>