<!DOCTYPE html>
<html lang="fr">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f3f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            gap: 20px;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .plan {
            flex: 1;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .plan h2 {
            font-size: 24px;
        }

        .price {
            font-size: 28px;
            font-weight: bold;
            color: #3b2a63;
        }

        .plan p {
            font-size: 14px;
            color: #666;
        }

        .button {
            display: inline-block;
            background: #3b2a63;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
            margin: 15px 0;
            display: block;
        }

        .features {
            list-style: none;
            padding: 0;
            text-align: left;
            margin-top: 10px;
        }

        .features li {
            padding: 5px 0;
        }

        .features li::before {
            content: "✔";
            color: #3b2a63;
            margin-right: 8px;
        }
    </style>


    <div class="container">
        <div class="plan">
            <h2>Essentiel</h2>
            <p class="price">5,99€</p>
            <p>Accès à la bibliothèque de base.</p>
            <a href="#" class="button">Choisir</a>
            <ul class="features">
                <li>Livres Gratuits</li>
                <li>Support 24/7</li>
                <li>Mises à Jour</li>
                <li>Accès Mobile</li>
                <li>Communauté</li>
            </ul>
        </div>

        <div class="plan">
            <h2>Avancé</h2>
            <p class="price">12,99€</p>
            <p>Accès à des livres premium.</p>
            <a href="#" class="button">Choisir</a>
            <ul class="features">
                <li>Livres Premium</li>
                <li>Recommandations</li>
                <li>Événements</li>
                <li>Sans Publicité</li>
                <li>Support Prioritaire</li>
            </ul>
        </div>

        <div class="plan">
            <h2>VIP</h2>
            <p class="price">24,99€</p>
            <p>Accès complet à tout.</p>
            <a href="#" class="button">Choisir</a>
            <ul class="features">
                <li>Accès Total</li>
                <li>Événements Exclusifs</li>
                <li>Support VIP</li>
                <li>Livres Gratuits</li>
                <li>Recommandations Personnalisées</li>
            </ul>
        </div>
    </div>

</html>