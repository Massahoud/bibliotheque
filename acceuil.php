<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <div class="nav-logo">
                <a href="#">Bibliotheque du BURKINA</a>
            </div>
            <ul class="nav-links">
                <li><a href="#">Home</a> </li>
                <li><a href="#">Features</a> </li>
                <li><a href="#">About Us</a> </li>
                <li><a href="#">Contact Us</a> </li>  
            </ul>
            <div class="search-box">
                <input type="search" name="search" id="search" placeholder="search"/>
                <i class="ri-search-line"></i>
            </div>
        </nav>
    </header>
        <main class="container">
            <section class="container-left">
                <div class="content">
                    <h1>
                        Discovering <br/>
                        The world
                    </h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Autem assumenda, vero natus temporibus quibusdam blanditiis quidem provident.
                         Quidem, magnam praesentium amet sit quae vero voluptatum earum iusto at voluptates pariatur?
                    </p>
                    <div class="btns">
                        <button class="read-more">Read More
                        </button>
                        <button class="our-blogs">Our Blogs</button>
                    </div>
                    <div class="chevrons">
                        <span class="left-chevrons">
                            <i class="ri-arrow-left-s-line"></i>
                        </span>
                        <span class="right-chevrons">
                            <i class="ri-arrow-right-s-line"></i>
                        </span>
                    </div>
                </div>
            </section>

            <section id="container" class="container-right">
                
                <!-- Formulaire de connexion -->
                <form id="loginForm" action="controllers/Auth.php" method="POST">
                    <h4>Login</h4>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required />
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="mot_de_passe" placeholder="Enter your password" required />
                    </div>
                    <input class="submit-travel" type="submit" value="Login" />
                    <p class="switch-text">
                        Don't have an account? <span id="switchToSignup">Sign Up</span>
                    </p>
                </form>
                <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-info"><?= $_SESSION['message'] ?></div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>
                <!-- Formulaire d'inscription -->
                <form  action="controllers/register.php" method="POST" id="signupForm"  style="display: none;" >
                    <h4>Sign Up</h4>
                    <div class="form-group">
                        <label for="signupNom">Nom:</label>
                        <input type="text" name="nom" class="form-control" placeholder="Entrer votre Nom" required>
                    </div>
                    <div class="form-group">
                        <label for="signupPrenom">Prenom:</label>
                        <input type="text" name="prenom" class="form-control" placeholder="Entrer votre prenom" required>
                    </div>
                    <div class="form-group">
                        <label for="signupEmail">Email:</label>
                        <input type="email" id="signupEmail" placeholder="Enter your email" name="email" required />
                    </div>
                    <div class="form-group">
                        <label for="signupPassword">Password:</label>
                        <input type="password" id="signupPassword" placeholder="Enter your password" name="mot_de_passe" required />
                    </div>
                   
                    <input class="submit-travel" type="submit" value="Sign Up" />
                    <p class="switch-text">
                        Already have an account? <span id="switchToLogin">Login</span>
                    </p>
                </form>
            </section>
            
        </main>
    <footer>
        <div class="bottom-tracker">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </footer>
    <script>
       
    // Sélection des éléments
    const loginForm = document.getElementById('loginForm');
    const signupForm = document.getElementById('signupForm');
    const switchToSignup = document.getElementById('switchToSignup');
    const switchToLogin = document.getElementById('switchToLogin');

    // Bascule vers le formulaire d'inscription
    switchToSignup.addEventListener('click', () => {
        loginForm.style.display = 'none';
        signupForm.style.display = 'block';
    });

    // Bascule vers le formulaire de connexion
    switchToLogin.addEventListener('click', () => {
        signupForm.style.display = 'none';
        loginForm.style.display = 'block';
    });


    </script>
</body>
</html>