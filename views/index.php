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


            <div class="col-lg-4 inp">

                <form action="">
                    <input onkeyup="searchFunction()" id="myInput" class="form-control mt-2" name="query" placeholder="search">
                    <span class="icon text-primary"><i class="fas fa-search"></i></span>
                </form>

                <h5 class="mt-2">Add New Contact</h5>

                <input class="form-control mb-3 mt-3" placeholder="add first name" id="firstName">
                <div id="firstNameAlert" class="alert alert-danger text-justify p-2 ">Please add first name</div>
                <input class="form-control mb-3 mt-3" placeholder="add last name" id="lastName">
                <div id="lastNameAlert" class="alert alert-danger text-justify p-2 ">Please add last name</div>
                <input class="form-control mb-3" placeholder="add phone" id="userPhone">
                <div id="phoneAlert" class="alert alert-danger text-justify p-2 ">Please add a valid number</div>

                <button onclick="addContact()" class="btn btn-info w-100 btn1">Add</button>


            </div>


            <div class="col-lg-8">

                <table id="myTable" class="table text-justify table-striped">

                    <thead class="tableh1">
                        <th class="col-1">select</th>
                        <th class="col-1">ID</th>
                        <th class="">FirstName</th>
                        <th class="">LastName</th>
                        <th class="">Phone</th>
                        <th class="col-1">delete</th>
                        <th class="col-1">edit</th>
                    </thead>

                    <tbody id="tableBody">

                        <?php foreach ($contacts as $contact) : ?>
                            <tr class="">
                                <td class="col-1">
                                    <div style="display: flex; justify-content: center; margin-block: 5px;"><input type="checkbox"></div>
                                </td>
                                <td class="col-1"> <?= $contact['ContactID'] ?> </td>
                                <td> <?= $contact['FirstName'] ?> </td>
                                <td> <?= $contact['LastName'] ?> </td>
                                <td> <?= $contact['Phone'] ?> </td>
                                <td class="col-1">
                                    <a href="<?= site_url("contact/delete/{$contact['ContactID']}") ?>" style="display: flex; justify-content: center;">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="red" version="1.1" id="Capa_1" width="20px" height="20px" viewBox="0 0 482.428 482.429" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M381.163,57.799h-75.094C302.323,25.316,274.686,0,241.214,0c-33.471,0-61.104,25.315-64.85,57.799h-75.098    c-30.39,0-55.111,24.728-55.111,55.117v2.828c0,23.223,14.46,43.1,34.83,51.199v260.369c0,30.39,24.724,55.117,55.112,55.117    h210.236c30.389,0,55.111-24.729,55.111-55.117V166.944c20.369-8.1,34.83-27.977,34.83-51.199v-2.828    C436.274,82.527,411.551,57.799,381.163,57.799z M241.214,26.139c19.037,0,34.927,13.645,38.443,31.66h-76.879    C206.293,39.783,222.184,26.139,241.214,26.139z M375.305,427.312c0,15.978-13,28.979-28.973,28.979H136.096    c-15.973,0-28.973-13.002-28.973-28.979V170.861h268.182V427.312z M410.135,115.744c0,15.978-13,28.979-28.973,28.979H101.266    c-15.973,0-28.973-13.001-28.973-28.979v-2.828c0-15.978,13-28.979,28.973-28.979h279.897c15.973,0,28.973,13.001,28.973,28.979    V115.744z" />
                                                    <path d="M171.144,422.863c7.218,0,13.069-5.853,13.069-13.068V262.641c0-7.216-5.852-13.07-13.069-13.07    c-7.217,0-13.069,5.854-13.069,13.07v147.154C158.074,417.012,163.926,422.863,171.144,422.863z" />
                                                    <path d="M241.214,422.863c7.218,0,13.07-5.853,13.07-13.068V262.641c0-7.216-5.854-13.07-13.07-13.07    c-7.217,0-13.069,5.854-13.069,13.07v147.154C228.145,417.012,233.996,422.863,241.214,422.863z" />
                                                    <path d="M311.284,422.863c7.217,0,13.068-5.853,13.068-13.068V262.641c0-7.216-5.852-13.07-13.068-13.07    c-7.219,0-13.07,5.854-13.07,13.07v147.154C298.213,417.012,304.067,422.863,311.284,422.863z" />
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </td>
                                <td class="col-1">
                                    <a href="<?= site_url("contact/edit/{$contact['ContactID']}") ?>" style="display: flex; justify-content: center;">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="green" height="20px" width="20px" version="1.1" id="Capa_1" viewBox="0 0 348.882 348.882" xml:space="preserve">
                                            <g>
                                                <path d="M333.988,11.758l-0.42-0.383C325.538,4.04,315.129,0,304.258,0c-12.187,0-23.888,5.159-32.104,14.153L116.803,184.231   c-1.416,1.55-2.49,3.379-3.154,5.37l-18.267,54.762c-2.112,6.331-1.052,13.333,2.835,18.729c3.918,5.438,10.23,8.685,16.886,8.685   c0,0,0.001,0,0.001,0c2.879,0,5.693-0.592,8.362-1.76l52.89-23.138c1.923-0.841,3.648-2.076,5.063-3.626L336.771,73.176   C352.937,55.479,351.69,27.929,333.988,11.758z M130.381,234.247l10.719-32.134l0.904-0.99l20.316,18.556l-0.904,0.99   L130.381,234.247z M314.621,52.943L182.553,197.53l-20.316-18.556L294.305,34.386c2.583-2.828,6.118-4.386,9.954-4.386   c3.365,0,6.588,1.252,9.082,3.53l0.419,0.383C319.244,38.922,319.63,47.459,314.621,52.943z" />
                                                <path d="M303.85,138.388c-8.284,0-15,6.716-15,15v127.347c0,21.034-17.113,38.147-38.147,38.147H68.904   c-21.035,0-38.147-17.113-38.147-38.147V100.413c0-21.034,17.113-38.147,38.147-38.147h131.587c8.284,0,15-6.716,15-15   s-6.716-15-15-15H68.904c-37.577,0-68.147,30.571-68.147,68.147v180.321c0,37.576,30.571,68.147,68.147,68.147h181.798   c37.576,0,68.147-30.571,68.147-68.147V153.388C318.85,145.104,312.134,138.388,303.85,138.388z" />
                                            </g>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

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
    // script('index.js');
    ?>

</body>

</html>