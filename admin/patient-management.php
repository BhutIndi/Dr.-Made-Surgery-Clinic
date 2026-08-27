<?php

session_start();

//TEMP PATIENT DATA

//array for the patient data
$patients = [
    [
        "id" => 1,
        "initial" => "J",
        "name" => "John Doe",
        "dateOfBirth" => "15 March 1985",
        "email" => "patient@drm.com",
        "phone" => "+27 41 123 4567",
        "medicalAid" => "Discovery Health",
        "medicalAidNumber" => "236948453/00",
        "bloodType" => "O+",
        "appointments" => 2
    ],

    [
        "id" => 2,
        "initial" => "T",
        "name" => "Thabo Molefe",
        "dateOfBirth" => "22 July 1990",
        "email" => "t.molefe@gmail.com",
        "phone" => "+27 72 456 7890",
        "medicalAid" => "Bonitas",
        "medicalAidNumber" => "452368845/01",
        "bloodType" => "A+",
        "appointments" => 2
    ],

    [
        "id" => 3,
        "initial" => "A",
        "name" => "Andie Mthembu",
        "dateOfBirth" => "5 November 1978",
        "email" => "a.mthembu@gmail.com",
        "phone" => "+27 83 369 5861",
        "medicalAid" => "Momentum Health",
        "medicalAidNumber" => "402358845/00",
        "bloodType" => "B-",
        "appointments" => 2
    ],

    [
        "id" => 4,
        "initial" => "S",
        "name" => "Sarah Sithole",
        "dateOfBirth" => "28 February 1995",
        "email" => "s.sithole@gmail.com",
        "phone" => "+27 61 256 7369",
        "medicalAid" => "Medshield",
        "medicalAidNumber" => "203688555/02",
        "bloodType" => "AB+",
        "appointments" => 1
    ]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Management | Dr Made General Practice</title>
    <link rel="stylesheet" href="../assets/css/admin.css"> <!-- shared admin styling -->
    <link rel="stylesheet" href="../assets/css/patients.css"> <!-- patient management styling -->
</head>
<body>

    <div class="dashboard">

        <!-- connecting the sidebar -->
        <?php include "../includes/sidebar.php"; ?>

        <!-- MAIN CONTENT IS HERE -->
        <main class="main-content patients-main">

            <!-- PAGE HEADER -->

            <header class="patients-header">
                <h1>Patient Management</h1>

                <!-- SEARCH FUNCTIN -->
                <div class="patient-search">

                    <svg viewBox="0 0 24 24">

                        <circle cx="11" cy="11" r="7"/>
                        <path d="m20 20-4-4"/>
                    </svg>

                    <input type="text" id="patientSearch" placeholder="Search patients..." autocomplete="off">
                </div>
            </header>

            <!-- PATIENT TABLE -->

            <section class="patients-table-card">

                <div class="patients-table-wrapper">

                    <table class="patients-table">

                        <!-- TABLE HEADER -->

                        <thead>

                            <tr>
                                <th>PATIENT</th>
                                <th>CONTACT</th>
                                <th>MEDICAL AID</th>
                                <th>BLOOD TYPE</th>
                                <th>APPOINTMENTS</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>

                        <tbody id="patientsTableBody">

                            <?php foreach ($patients as $patient):?>

                                <tr class="patient-row"
                                    data-search="<?php echo htmlspecialchars(
                                        strtolower(
                                            $patient["name"]
                                            . " "
                                            . $patient["email"]
                                            . " "
                                            . $patient["phone"]
                                            . " "
                                            . $patient["medicalAid"]
                                            )
                                        ); 
                                        ?>"
                                    data-id="<?php echo $patient["id"]; ?>">

                                    <!-- PATIENT -->
                                    <td>

                                        <div class="patient-information">
                                            <div class="patient-avatar">

                                                <?php echo htmlspecialchars(
                                                    $patient["initial"]
                                                );
                                                ?>
                                            </div>

                                            <div class="patient-name">
                                                <strong>
                                                    <?php echo htmlspecialchars(
                                                        $patient["name"]
                                                    );
                                                    ?>
                                                </strong>

                                                <span>
                                                    DOB:

                                                    <?php echo htmlspecialchars(
                                                        $patient["dateOfBirth"]
                                                    );
                                                    ?>

                                                </span>

                                            </div>

                                        </div>

                                    </td>

                                    <!-- CONTACT -->

                                    <td>
                                        <div class="contact-information">

                                            <span>
                                                <?php echo htmlspecialchars(
                                                    $patient["email"]
                                                );
                                                ?>
                                            </span>

                                            <span>
                                                <?php echo htmlspecialchars(
                                                    $patient["phone"]
                                                );
                                                ?>
                                            </span>

                                        </div>

                                    </td>

                                    <!-- MEDICAL AID -->

                                    <td>

                                        <div class="medical-information">

                                            <span>
                                                <?php echo htmlspecialchars(
                                                    $patient["medicalAid"]
                                                );
                                                ?>
                                            </span>

                                            <small>

                                                <?php echo htmlspecialchars(
                                                    $patient["medicalAidNumber"]
                                                );
                                                ?>

                                            </small>

                                        </div>

                                    </td>

                                    <!-- BLOOD TYPE -->

                                    <td>
                                        <span class="blood-type">

                                            <?php echo htmlspecialchars(
                                                $patient["bloodType"]
                                            );
                                            ?>

                                        </span>

                                    </td>

                                    <!-- APPOINTMENTS -->

                                    <td>
                                        <span class="appointment-count">

                                            <?php echo htmlspecialchars(
                                                $patient["appointments"]
                                            );
                                            ?>

                                            total
                                        </span>

                                    </td>

                                    <!-- ACTIONS -->

                                    <td>

                                        <button type="button" class="view-records-button" data-id="<?php echo $patient["id"]; ?>">
                                            View Records
                                        </button>

                                    </td>
                                
                                </tr>

                                <?php endforeach; ?>

                            </tbody>

                        </table>
       
                    </div>


                    <!-- EMPTY SEARCH RESULT -->
                    <div id="noPatients" class="no-patients" hidden>
                        No patients found.
                    </div>

                </section>

          </main>
    </div>

    <!-- PATIENT RECORD MODAL -->

    <div id="patientModal" class="patient-modal-overlay" hidden>

        <div class="patient-modal">

            <button type="button" class="patient-modal-close" id="closePatientModal" aria-label="Close">

                x

            </button>

            <h2>Patient Records</h2>

            <div id="patientModalContent" class="patient-modal-content"></div>

        </div>

    </div>

    <!-- PATIENT DATA FOR JAVASCRIPT -->

    <script>

        const patients = <?php

        echo json_encode($patients, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
        ?>;
     
    </script> 

    <script src="../assets/js/patients.js"></script>
    
</body>
</html>