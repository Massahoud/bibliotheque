<!DOCTYPE html>
<html lang="fr">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f2f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            display: flex;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .left {
            flex: 1;
            padding-right: 20px;
        }
        .right {
            flex: 1;
        }
        h1 {
            font-size: 36px;
            font-weight: bold;
        }
        p {
            font-size: 16px;
            color: #666;
        }
        .contact-btn {
            display: inline-block;
            background-color: #443c68;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .submit-btn {
            background-color: #443c68;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            font-size: 16px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #322a50;
        }
    </style>



    <div class="container">
        <div class="left">
            <a href="#" class="contact-btn">Contactez Nous</a>
            <h1>Restons en Contact</h1>
            <p>Des questions? Nous avons des réponses!</p>
        </div>
        <div class="right">
            <form>
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" id="name" placeholder="Votre nom">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Votre email">
                </div>
                <div class="form-group">
                    <label for="phone">Téléphone</label>
                    <input type="tel" id="phone" placeholder="Votre téléphone">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" rows="4" placeholder="Votre message"></textarea>
                </div>
                <button type="submit" class="submit-btn">Envoyer Message</button>
            </form>
        </div>
    </div>


</html>
