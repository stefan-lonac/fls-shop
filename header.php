<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/stefan-style.css">

    <!-- <link rel="stylesheet" href="fontawesome/css/all.css"> -->

    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <script src="fontawesome/js/all.js"></script>


    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=latin-ext" rel="stylesheet">
    <!-- https://codepen.io/ElGrecode/pen/LEmbBE -->


    <!-- VUE js script -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



    <!-- Load required Bootstrap and BootstrapVue CSS -->
    <!-- <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap/dist/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css" />
 -->
    <!-- Load polyfills to support older browsers -->
    <script src="//polyfill.io/v3/polyfill.min.js?features=es2015%2CMutationObserver" crossorigin="anonymous"></script>

    <!-- Load Vue followed by BootstrapVue -->
    <script src="//unpkg.com/vue@latest/dist/vue.min.js"></script>
    <script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js"></script>



    <!-- import CSS -->
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    <!-- import JavaScript -->
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>

    <title>FLS Shop</title>
</head>
<body>


<header>
    
    <ul>
        <li>
            <a href="bestellen.php">BESTELLEN</a>
        </li>
        <li>
            <a href="sent-link.php">LINK IST GESANDT</a>
        </li>
        <li class="table-header">
            <a href="table.php">SCHULEN DIE DAS FLS HABEN</a>
        </li>
        <li>
            <a href="order-list.php">BESTELL-LISTE</a>
        </li>
        <li>
            <a href="finished.php">ERFOLGREICH BEENDET</a>
        </li>
    </ul>

</header>

<!-- 
	========================================================
	======================================================== 
				START: page class 
	========================================================
	======================================================== 
-->
	<div class="page" id="vueapp">

	