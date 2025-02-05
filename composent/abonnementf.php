<!DOCTYPE html>
<html lang="fr">
    <style>
        body {
            background-color: #f4f2fc;
        }
        .pricing-card {
            background-color: white;
            border-radius: 20px;
            padding: 30px;
            text-align: left;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .pricing-card h2 {
            font-weight: bold;
        }
        .pricing-card ul {
            list-style: none;
            padding: 0;
        }
        .pricing-card ul li {
            padding: 8px 0;
            border-bottom: 1px solid #ddd;
        }
        .pricing-card .price {
            font-size: 1.8rem;
            font-weight: bold;
            margin-top: 15px;
        }
        .subscribe-btn {
            background-color: #55488d;
            color: white;
            border-radius: 25px;
            padding: 10px 20px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            margin-top: 15px;
        }
        .subscribe-btn:hover {
            background-color: #443773;
        }
    </style>


<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Carte Basique -->
        <div class="col-md-5 mx-2">
            <div class="pricing-card">
                <h2>Basique</h2>
                <p>Accès à des milliers de livres.</p>
                <ul>
                    <li>Lecture Illimitée</li>
                    <li>Support Client</li>
                    <li>Mises à Jour</li>
                    <li>Accès Mobile</li>
                    <li>Communauté</li>
                </ul>
                <p class="price">9,99€/mois</p>
                <a href="#" class="subscribe-btn">S'abonner</a>
            </div>
        </div>
        
        <!-- Carte Premium -->
        <div class="col-md-5 mx-2">
            <div class="pricing-card">
                <h2>Premium</h2>
                <p>Tout le Basique + des livres exclusifs.</p>
                <ul>
                    <li>Livres Exclusifs</li>
                    <li>Recommandations Personnalisées</li>
                    <li>Accès Anticipé</li>
                    <li>Événements Spéciaux</li>
                    <li>Sans Publicité</li>
                </ul>
                <p class="price">19,99€/mois</p>
                <a href="#" class="subscribe-btn">S'abonner</a>
            </div>
        </div>
    </div>
</div>

</html>