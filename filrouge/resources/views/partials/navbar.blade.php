<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar - Supportify</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        :root {
            --bg-dark: #0f1123;
            --accent: #ff5c35;
            --text-primary: #ffffff;
            --text-secondary: #a0a3bd;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-primary);
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        header {
            padding: 20px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--text-primary);
            text-decoration: none;
        }

        .logo i {
            color: var(--accent);
            margin-right: 8px;
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin-left: 30px;
        }

        nav ul li a {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: var(--text-primary);
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: var(--accent);
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #e64a19;
        }
    </style>
</head>
<body>
    <header class="container">
        <a href="#" class="logo">
            <i class="fas fa-headset"></i>
            Supportify
        </a>

        <nav>
            <ul>
                <li><a href="{{ route('fonctionnalite') }}">Fonctionnalités</a></li>
                <li><a href="#">Solutions</a></li>
                <li><a href="#">Tarification</a></li>
                <li><a href="#">Témoignages</a></li>
            </ul>
        </nav>

        <a href="{{ route('register') }}" class="btn">Démarrer</a>
    </header>
</body>
</html>
