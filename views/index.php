<?php ?>

<html>

<head>

    <?php
    stylesheet('bootstrap.min.css');
    stylesheet('all.min.css');
    stylesheet('index_style.css');
    ?>


</head>

<body>



    <div class="jumbotron jum">

        <div class=" navbar">
            <h3>Phone Book <i class="far fa-address-book"></i></h3>

        </div>


        <div class="row">


            <div class="col-lg-4 inp">

                <input onkeyup="searchFunction()" id="myInput" class="form-control mt-2" placeholder="search">
                <span class="icon text-primary"><i class="fas fa-search"></i></span>

                <h5 class="mt-2">Add New Contact</h5>

                <input onblur="validateName()" class="form-control mb-3 mt-3" placeholder="add name" id="userName">
                <div id="nameAlert" class="alert alert-danger text-justify p-2 ">Please add name</div>
                <input onblur="validatePhone()" class="form-control mb-3" placeholder="add phone" id="userPhone">
                <div id="phoneAlert" class="alert alert-danger text-justify p-2 ">Please add a valid number</div>
                <input onblur="validateEmail()" class="form-control mb-3" placeholder="add e-mail" id="userEmail">
                <div id="mailAlert" class="alert alert-danger text-justify p-2 ">Please add a valid e-mail</div>

                <button onclick="addContact()" class="btn btn-info w-100 btn1">Add</button>


            </div>


            <div class="col-lg-8">

                <table id="myTable" class="table text-justify table-striped">

                    <thead class="tableh1">
                        <th class="">Name</th>
                        <th class="">Phone</th>
                        <th class="">E-mail</th>
                        <th class="col-1"></th>
                        <th class="col-1"></th>
                    </thead>

                    <tbody id="tableBody">



                    </tbody>

                </table>


            </div>



        </div>
    </div>



    <footer class="text-center">Ahmad Al-Shahawi 2019.All rights reserved</footer>

    <?php
    script('jquery-3.3.1.min.js');
    script('popper.min.js');
    script('bootstrap.min.js');
    script('index.js');
    ?>

</body>

</html>