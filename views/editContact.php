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
            <h3><a href="<?= site_url('') ?>">Phone Book <i class="far fa-address-book"></i></a></h3>

        </div>


        <div class="row">


            <div class="col-lg-12 inp">

                <h5 class="mt-2">Edit Contact</h5>

                <!-- <form action="<? //=site_url("contact/edit/$contactID") 
                                    ?>" method="post"> -->
                <div data-target="<?= site_url("contact/edit/$ContactID") ?>">
                    <input class="form-control mb-3 mt-3" value="<?= $FirstName ?>" id="firstName" name="firstName">
                    <div id="firstNameAlert" class="alert alert-danger text-justify p-2 ">Please add first name</div>
                    <input class="form-control mb-3 mt-3" value="<?= $LastName ?>" id="lastName" name="lastName">
                    <div id="lastNameAlert" class="alert alert-danger text-justify p-2 ">Please add last name</div>
                    <input class="form-control mb-3" value="<?= $Phone ?>" id="userPhone" name="userPhone">
                    <div id="phoneAlert" class="alert alert-danger text-justify p-2 ">Please add a valid number</div>
                    <button id="contactSubmit" class="btn btn-info w-100 btn1">
                        Edit
                    </button>
                </div>


            </div>



        </div>
    </div>



    <footer class="text-center">Ahmad Al-Shahawi 2019.All rights reserved</footer>

    <?php
    script('jquery-3.3.1.min.js');
    script('popper.min.js');
    script('bootstrap.min.js');
    // script('index.js');
    script('formQuery.js');
    script('contact.js');
    ?>

</body>

</html>