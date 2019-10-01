<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gameplay Party</title>
    <meta name="author" content="ALBOE">
    <meta name="description" content="Gameplay Party">
    <meta name="keywords" content="keywords,here">
    <script src="assets/js/main.js" type="module"></script>

    <!--    wizziwick-->
    <script src="https://cdn.tiny.cloud/1/6hm4wgcoj7hq4i71e8y0b5z97t5nqn081rp8cjbnirrfg54k/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>

    <link rel="stylesheet" href="compiled/style.css" type="text/css">
    <!--    jquery cdn-->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!--    bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--    fontawesome-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css" rel="stylesheet"
          crossorigin="anonymous">
    <!--    slick js-->
    <link rel="stylesheet" type="text/css" href="assets/style/slick.css"/>
    <!--    editor js-->
    <script src="https://cdn.jsdelivr.net/combine/npm/@editorjs/link@2.1.3,npm/@editorjs/list@1.4.0,npm/@editorjs/checklist@1.1.0,npm/@editorjs/embed@2.2.1,npm/@editorjs/quote@2.3.0,npm/@editorjs/header@2.3.0,npm/@editorjs/simple-image@1.3.2,npm/@editorjs/editorjs@2.15.1"></script>
    <script>
        $( document ).ready(function() {
            $(".beheerContent").on( "click", function() {
                $id = this.classList[1];
                console.log($id);
                tinymce.init({
                    selector: `textarea.${$id}`,
                });
            })
        });
    </script>
</head>
<body>
<div class="logo-container">
    <img class="logo" src="assets/img/logo.svg" alt="logo">
</div>
<nav class="navbar navbar-expand-lg navbar-dark justify-content-end">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-dark navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?request=beheer&pagina=Home">Beheer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?request=bioscopen">Bioscopen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?request=contact">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?request=login">Login</a>
            </li>
        </ul>
    </div>
</nav>
