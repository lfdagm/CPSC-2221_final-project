<?php include '../components/head.php'; ?>
<?php include '../components/navbar.php'; ?>



<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Customer</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Create customer</li>
            </ol>

            <div class="card mb-4">



                <form class="m-3" action="processors/customer-process.php" method="post">
                    <div class="mb-3">
                        <label for="first-name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first-name" name="first-name"
                            aria-describedby="nameHelp">
                    </div>

                    <div class="mb-3">
                        <label for="last-name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last-name" name="last-name"
                            aria-describedby="nameHelp">
                    </div>

                    <div class="mb-3">
                        <label for="passport" class="form-label">Passport Number</label>
                        <input type="text" class="form-control" id="passport" name="passport"
                            aria-describedby="lastnameHelp">
                    </div>

                    <div class="d-flex justify-content-evenly mb-3">
                        <div class="p-2 mb-3 flex-fill">Gender
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender-f" value="F">
                                <label class="form-check-label" for="gender-f">
                                    F
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender-m" value="M">
                                <label class="form-check-label" for="gender-m">
                                    M
                                </label>
                            </div>

                        </div>

                        <div class="p-2 mb-3 flex-fill">Veteran or Active Military Member
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="military" id="military" value="yes"
                                    data-bs-toggle="collapse" data-bs-target=".collapseOne:not(.in)"
                                    aria-expanded="false" aria-controls="military-id-section">

                                <label class="form-check-label" for="military">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="military" id="non-military"
                                    value="no" data-bs-toggle="collapse" data-bs-target=".collapseTwo:not(.in)">
                                <label class="form-check-label" for="non-military">
                                    No
                                </label>
                            </div>
                        </div>

                        <div class="collapseOne collapse">
                            <div id="military-id-section" class=" p-2 mb-3 flex-fill">
                                <label for="military-id" class="form-label">Military ID</label>
                                <input type="text" class="form-control" id="military-id" name="military-id">
                            </div>

                            <div class="collapseTwo collapse">
                                <div id="loyalty" class=" p-2 mb-3 flex-fill">
                                    <label for="loyalty" class="form-label">Loyalty status</label>
                                    <input type="text" class="form-control" id="loyalty-status" name="loyalty-status">
                                </div>

                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>


        </div>
    </main>


    <?php include '../components/footer.php'; ?>