<!DOCTYPE html>
<html lang="fr">

<style>
    /* Global */
body {
    font-family: Arial, sans-serif;
    background-color: #625582;
    color: white;
    text-align: center;
    margin: 0;
    padding: 0;
}

/* Bannière */
.banner {
    font-size: 24px;
    font-weight: bold;
    padding: 20px;
    background: transparent;
}

/* Section Héro */
.hero {
    margin-top: 50px;
}

.badge {
    background-color: #4a4458;
    color: white;
    display: inline-block;
    padding: 8px 16px;
    border-radius: 20px;
    font-weight: bold;
    font-size: 16px;
}

.icon {
    margin-right: 8px;
}

h2 {
    font-size: 36px;
    font-weight: bold;
}

p {
    font-size: 18px;
}

.cta {
    background-color: #463d5c;
    color: white;
    border: none;
    padding: 12px 20px;
    font-size: 18px;
    border-radius: 20px;
    cursor: pointer;
    margin-top: 10px;
}

.cta:hover {
    background-color: #5a4d78;
}

/* Section Équipe */
.team {
    margin-top: 80px;
    padding: 50px 0;
}

.team-title {
    font-size: 40px;
    font-weight: bold;
    margin-bottom: 40px;
}

.team-container {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
}

.team-card {
    background: white;
    color: black;
    border-radius: 15px;
    width: 280px;
    overflow: hidden;
    text-align: center;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
}

.team-card img {
    width: 100%;
    height: auto;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
}

.card-info {
    padding: 15px;
}

.card-info h3 {
    margin: 5px 0;
    font-size: 20px;
    font-weight: bold;
}

.card-info p {
    margin: 0;
    font-size: 16px;
    color: #625582;
}

</style>
    <!-- Bannière -->
    <header class="banner">
        <h1>Votre bibliothèque en ligne * Accès</h1>
    </header>
    
    <!-- Section Héro -->
    <section class="hero">
        <span class="badge">
            <span class="icon">✏️</span> Bibliothèque Électronique
        </span>
        <h2>Votre bibliothèque, <br> à portée de main !</h2>
        <p>Explorez, empruntez et lisez sans limites !</p>
        <button class="cta">Commencez Maintenant</button>
    </section>

    <!-- Section Équipe -->
    <section class="team">
        <h2 class="team-title">Notre Équipe Épatante</h2>
        <div class="team-container">
            <div class="team-card">
                <img src="sophie.jpg" alt="Sophie Martin">
                <div class="card-info">
                    <h3>Sophie Martin</h3>
                    <p>Directrice de Projet</p>
                </div>
            </div>
            <div class="team-card">
                <img src="lucas.jpg" alt="Lucas Dupont">
                <div class="card-info">
                    <h3>Lucas Dupont</h3>
                    <p>Développeur Web</p>
                </div>
            </div>
            <div class="team-card">
                <img src="clara.jpg" alt="Clara Moreau">
                <div class="card-info">
                    <h3>Clara Moreau</h3>
                    <p>Designer Créatif</p>
                </div>
            </div>
        </div>
    </section>


</html>
