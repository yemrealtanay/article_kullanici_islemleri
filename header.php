<?php
session_start(); //session_start(); fonksiyonunu sadece header.php'de çağırıyoruz. Diğer tüm sayfalara header gidiyor zaten. 

if (!isset($documentTitle)) $documentTitle = "Articles";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <?php
    $baseFontSize = 16;
    if (isset($_COOKIE['base-font-size'])) $baseFontSize = $_COOKIE['base-font-size'];
    ?>
    <style>
    :root {
        font-size: <?=$baseFontSize ?>px;
    }
    </style>
    <title><?= $documentTitle; ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Articles</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="random.php">Random Article</a>
                    </li>



                    <?php if(isset($_SESSION['user'])) : ?>
                    <!--Bu bölgede eğer session içinde user varsa diye soruyoruz -->

                    <?php if($_SESSION['is_admin'] || $_SESSION['is_editor']) : ?>
                    <!--bu bölgede user eğer adminse ya da editörse diye soruyoruz çünkü bu menü elementini sadece admin ve editör görsün istiyoruz
                    Ayrıca bu user ve editör bilgisi login.php üzerinden bize geliyor-->
                    <li class="nav-item">
                        <a class="nav-link" href="newarticle.php">Create New Article</a>
                    </li>
                    <?php endif; ?>
                    <!--burada user if'inin-->
                    <?php endif; ?>
                    <!--burada ise admin editör ifinin sonunu getiriyoruz-->

                    <!--buradan sonra user var mı varsa login olmuş mu sorularını sorarak eğer bir login durumu yoksa
                        kullanıcı adı giriş panelinin görünmesini sağlayacağız-->
                    <?php if(isset($_SESSION['user'])) : ?>

                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Hoşgeldin:
                            <?= $_SESSION['user'] ?> |</a>
                    </li>



                    <?php if($_SESSION['is_admin']) : ?>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Admin Yetkilerin
                            Tanımlandı</a>
                    </li>

                    <?php endif; ?>
                    <li><a class="btn btn-sm mr-5 btn-danger" href="logout.php" role="button">Çıkış Yap</a></li>
                    <?php else : ?>
                    <form class="form-inline" action="login.php" method="post">
                        <div class="row">
                            <div class="col">
                                <input class="form-control mr-sm-2" type="text" name="username"
                                    placeholder="Kullanıcı Adı">
                            </div>
                            <div class="col">
                                <input class="form-control mr-sm-2" type="password" name="password"
                                    placeholder="Parola">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-warning my-2 my-sm-0">Giriş Yap</button>
                                <!--buton tipi submit olmalı gideceği yer form action'unda belirtiliyor-->
                            </div>
                        </div>
                    </form>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>