<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Home | Ramen House</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: "Segoe UI", sans-serif;
}

/* NAVBAR */
.navbar{
    padding:20px 60px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    background:#fff;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}
.logo{
    font-weight:bold;
}
.navbar ul{
    list-style:none;
    display:flex;
    gap:25px;
}
.navbar ul li{
    font-size:14px;
}
.logout{
    background:#f57c00;
    padding:8px 15px;
    color:#fff;
    text-decoration:none;
    border-radius:5px;
}

/* HERO */
.hero{
    height:400px;
    background:
        linear-gradient(rgba(0,0,0,.5),rgba(0,0,0,.5)),
        url("assets/tonkotsu.jpg") center/cover no-repeat;
    display:flex;
    align-items:center;
    padding-left:80px;
    color:#fff;
}

.hero h1{
    font-size:42px;
}

/* SECTION */
.section{
    padding:60px 80px;
}
.section h2{
    text-align:center;
    margin-bottom:35px;
}

/* CARDS */
.cards{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:30px;
}

.card{
    background:#fff;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 10px 20px rgba(0,0,0,0.15);
    text-align:center;
}

.card img{
    width:100%;
    height:220px;
    object-fit:cover;
}

.card h3{
    margin:15px 0 5px;
}

.card p{
    font-size:14px;
    color:#777;
}

.card button{
    margin:15px 0 20px;
    padding:10px 18px;
    border:none;
    background:#f57c00;
    color:#fff;
    border-radius:5px;
    cursor:pointer;
}

/* FOOTER */
.footer{
    background:#222;
    color:#ccc;
    padding:35px;
    text-align:center;
    margin-top:60px;
}
</style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">RAMEN HOUSE</div>
    <ul>
        <li>Home</li>
        <li>Menu</li>
        <li>Order Online</li>
        <li>Contact</li>
    </ul>
    <a class="logout" href="logout.php">Logout</a>
</div>

<!-- HERO -->
<div class="hero">
    <div>
        <h1>Welcome to Ramen House</h1>
        <p>Authentic Taste, Served Fresh</p>
    </div>
</div>

<!-- FEATURED DISHES -->
<div class="section">
    <h2>Featured Dishes</h2>

    <div class="cards">

        <div class="card">
            <img src="assets/tonkotsu.jpg" alt="Tonkotsu Ramen">
            <h3>Tonkotsu Ramen</h3>
            <p>Rich pork broth with tender noodles</p>
            <button>Add to Cart</button>
        </div>

        <div class="card">
            <img src="assets/miso.jpg" alt="Miso Ramen">
            <h3>Miso Ramen</h3>
            <p>Savory miso broth with fresh toppings</p>
            <button>Add to Cart</button>
        </div>

        <div class="card">
            <img src="assets/spicy.jpg" alt="Spicy Ramen">
            <h3>Spicy Ramen</h3>
            <p>Hot & spicy ramen for chili lovers</p>
            <button>Add to Cart</button>
        </div>

    </div>
</div>

<!-- FOOTER -->
<div class="footer">
    © 2026 Ramen House. All Rights Reserved.
</div>

</body>
</html>
