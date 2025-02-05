<!DOCTYPE html>
<html lang="fr">

    <style>
        body {
            background-color: #635985;
            font-family: Arial, sans-serif;
            text-align: center;
            color: white;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            margin-top: 50px;
        }

        .top-row {
            display: flex;
            gap: 20px;
        }

        .top-row div {
            background-color: white;
            padding: 20px 40px;
            border-radius: 15px;
            font-weight: bold;
            font-size: 18px;
            color: black;
        }

        .bottom-row {
            display: flex;
            gap: 20px;
        }

        .card {
            background-color: white;
            padding: 20px;
            border-radius: 15px;
            width: 300px;
            text-align: left;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            color: black;
        }

        .card h3 {
            margin-bottom: 10px;
            font-size: 20px;
        }

        /* Section "Où Nous Trouver" */
        .map-section {
            background-color: #4f4373;
            padding: 50px 0;
            margin-top: 50px;
            width: 100%;
        }

        .map-section h2 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .map-container {
            display: flex;
            justify-content: center;
        }

        iframe {
            width: 80%;
            height: 450px;
            border-radius: 15px;
            border: none;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }
    </style>

    <div class="container">
        <div class="top-row">
            <div>Innovant</div>
            <div>Pratique</div>
            <div>Amusant</div>
        </div>
        <div class="bottom-row">
            <div class="card">
                <h3>Recherche Rapide</h3>
                <p>Trouvez vos livres préférés en un clin d'œil, sans perdre votre temps précieux !</p>
            </div>
            <div class="card">
                <h3>Emprunt Facile</h3>
                <p>Empruntez des livres en quelques clics, c'est aussi simple que ça !</p>
            </div>
        </div>
    </div>

    <!-- Section Carte -->
    <div class="map-section">
        <h2>Où Nous Trouver</h2>
        <div class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24158.11604472665!2d-74.0060156!3d40.7127281!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zTmfDqHRhY2hlIEdvb2dsZQ!5e0!3m2!1sen!2sfr!4v1618305805621!5m2!1sen!2sfr"
                allowfullscreen=""
                loading="lazy">
            </iframe>
        </div>
    </div>

</html>
