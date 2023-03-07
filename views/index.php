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

                <!-- <form action="<? //=site_url("contact/create") 
                                    ?>" method="post"> -->
                <div data-target="<?= site_url('contact/create') ?>">
                    <input class="form-control mb-3 mt-3" placeholder="add first name" id="firstName" name="firstName">
                    <div id="firstNameAlert" class="alert alert-danger text-justify p-2 ">Please add first name</div>
                    <input class="form-control mb-3 mt-3" placeholder="add last name" id="lastName" name="lastName">
                    <div id="lastNameAlert" class="alert alert-danger text-justify p-2 ">Please add last name</div>
                    <input class="form-control mb-3" placeholder="add phone" id="userPhone" name="userPhone">
                    <div id="phoneAlert" class="alert alert-danger text-justify p-2 ">Please add a valid number</div>
                    <button id="contactSubmit" class="btn btn-info w-100 btn1">
                        Add
                    </button>
                </div>


            </div>


            <div class="col-lg-8">

                <nav class="d-flex justify-content-center align-items-center mb-2 pager">
                    <?php if ($currentPage > 1) : ?>
                        <a href="<?= setPage(1) ?>">
                            <svg class="rotate-180" width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.6797 14.62L14.2397 12.06L11.6797 9.5" stroke="#fff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M4 12.0596H14.17" stroke="#fff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12 4C16.42 4 20 7 20 12C20 17 16.42 20 12 20" stroke="#fff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>

                        <a href="<?= setPage($currentPage - 1) ?>">
                            <svg class="rotate-180" fill="#fff" height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 294.997 294.997" xml:space="preserve">
                                <g>
                                    <path d="M286.36,98.016c-13.223-37.091-40.098-66.813-75.675-83.691C175.109-2.554,135.088-4.567,97.997,8.656
                                C60.906,21.879,31.183,48.754,14.305,84.331C-2.572,119.908-4.585,159.928,8.637,197.02c1.113,3.122,4.547,4.748,7.667,3.637
                                c3.122-1.113,4.75-4.545,3.637-7.667C7.794,158.918,9.643,122.155,25.147,89.474s42.807-57.369,76.879-69.515
                                c34.072-12.146,70.836-10.296,103.516,5.207c32.682,15.504,57.369,42.807,69.516,76.879c12.146,34.072,10.297,70.835-5.207,103.516
                                s-42.807,57.369-76.879,69.515c-38.189,13.613-80.082,9.493-114.935-11.304c-2.848-1.699-6.529-0.768-8.227,2.078
                                c-1.698,2.846-0.768,6.529,2.078,8.227c23.207,13.848,49.276,20.903,75.541,20.902c16.674,0,33.43-2.845,49.572-8.599
                                c37.092-13.223,66.813-40.098,83.691-75.675C297.57,175.127,299.583,135.107,286.36,98.016z" />
                                    <path d="M213.499,147.518c0-3.313-2.687-6-6-6H58.069c-3.314,0-6,2.687-6,6s2.686,6,6,6h149.43
		                        C210.812,153.518,213.499,150.831,213.499,147.518z" />
                                    <path d="M165.686,210.275c-2.344,2.343-2.344,6.142,0,8.485c1.171,1.171,2.707,1.757,4.242,1.757s3.071-0.586,4.242-1.757l67-67
                                c2.344-2.343,2.344-6.142,0-8.485l-67-67c-2.342-2.343-6.143-2.343-8.484,0c-2.344,2.343-2.344,6.142,0,8.485l62.757,62.757
                                L165.686,210.275z" />
                                </g>
                            </svg>
                        </a>
                    <?php endif; ?>
                    <span>
                        <?= $currentPage ?>
                        /
                        <?= $totalPages ?>
                    </span>
                    <?php if ($currentPage < $totalPages) : ?>
                        <a href="<?= setPage($currentPage + 1) ?>">
                            <svg fill="#fff" height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 294.997 294.997" xml:space="preserve">
                                <g>
                                    <path d="M286.36,98.016c-13.223-37.091-40.098-66.813-75.675-83.691C175.109-2.554,135.088-4.567,97.997,8.656
                                C60.906,21.879,31.183,48.754,14.305,84.331C-2.572,119.908-4.585,159.928,8.637,197.02c1.113,3.122,4.547,4.748,7.667,3.637
                                c3.122-1.113,4.75-4.545,3.637-7.667C7.794,158.918,9.643,122.155,25.147,89.474s42.807-57.369,76.879-69.515
                                c34.072-12.146,70.836-10.296,103.516,5.207c32.682,15.504,57.369,42.807,69.516,76.879c12.146,34.072,10.297,70.835-5.207,103.516
                                s-42.807,57.369-76.879,69.515c-38.189,13.613-80.082,9.493-114.935-11.304c-2.848-1.699-6.529-0.768-8.227,2.078
                                c-1.698,2.846-0.768,6.529,2.078,8.227c23.207,13.848,49.276,20.903,75.541,20.902c16.674,0,33.43-2.845,49.572-8.599
                                c37.092-13.223,66.813-40.098,83.691-75.675C297.57,175.127,299.583,135.107,286.36,98.016z" />
                                    <path d="M213.499,147.518c0-3.313-2.687-6-6-6H58.069c-3.314,0-6,2.687-6,6s2.686,6,6,6h149.43
		                        C210.812,153.518,213.499,150.831,213.499,147.518z" />
                                    <path d="M165.686,210.275c-2.344,2.343-2.344,6.142,0,8.485c1.171,1.171,2.707,1.757,4.242,1.757s3.071-0.586,4.242-1.757l67-67
                                c2.344-2.343,2.344-6.142,0-8.485l-67-67c-2.342-2.343-6.143-2.343-8.484,0c-2.344,2.343-2.344,6.142,0,8.485l62.757,62.757
                                L165.686,210.275z" />
                                </g>
                            </svg>
                        </a>
                        <a href="<?= setPage($totalPages) ?>">
                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.6797 14.62L14.2397 12.06L11.6797 9.5" stroke="#fff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M4 12.0596H14.17" stroke="#fff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12 4C16.42 4 20 7 20 12C20 17 16.42 20 12 20" stroke="#fff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    <?php endif; ?>
                </nav>

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
    script('formQuery.js');
    script('contact.js');
    ?>

</body>

</html>