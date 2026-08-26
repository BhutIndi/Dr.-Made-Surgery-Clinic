<?php

session_start();

/*
|--------------------------------------------------------------------------
| APPOINTMENT DATA
|--------------------------------------------------------------------------
| Temporary GUI data.
| This will later come from MySQL.
|--------------------------------------------------------------------------
*/

$appointments = [

    [
        "id" => 1,
        "patient" => "Thabo Molefe",
        "doctor" => "Dr. Sarah Nkosi",
        "date" => "22 June 2026",
        "time" => "09:00",
        "type" => "Post-operative follow-up",
        "priority" => "Semi-Urgent",
        "medical_aid" => "Bonitas",
        "status" => "Confirmed"
    ],

    [
        "id" => 2,
        "patient" => "Andie Mthembu",
        "doctor" => "Dr. Sarah Nkosi",
        "date" => "21 June 2026",
        "time" => "11:00",
        "type" => "New Patient",
        "priority" => "Routine",
        "medical_aid" => "Momentum Health",
        "status" => "Pending"
    ],

    [
        "id" => 3,
        "patient" => "Thabo Molefe",
        "doctor" => "Dr. Sarah Nkosi",
        "date" => "23 June 2026",
        "time" => "09:30",
        "type" => "Check-up",
        "priority" => "Routine",
        "medical_aid" => "Bonitas",
        "status" => "Confirmed"
    ],

    [
        "id" => 4,
        "patient" => "Sarah Sithole",
        "doctor" => "Dr. David Williams",
        "date" => "22 June 2026",
        "time" => "14:00",
        "type" => "Consultation",
        "priority" => "Routine",
        "medical_aid" => "Medshield",
        "status" => "Pending"
    ],

    [
        "id" => 5,
        "patient" => "John Doe",
        "doctor" => "Dr. Michael Chen",
        "date" => "20 June 2026",
        "time" => "10:00",
        "type" => "Post-operative",
        "priority" => "Routine",
        "medical_aid" => "Discovery Health",
        "status" => "Completed"
    ],

    [
        "id" => 6,
        "patient" => "Andie Mthembu",
        "doctor" => "Dr. Lisa Dlamini",
        "date" => "24 June 2026",
        "time" => "15:00",
        "type" => "Consultation",
        "priority" => "Urgent",
        "medical_aid" => "Momentum Health",
        "status" => "Confirmed"
    ],

    [
        "id" => 7,
        "patient" => "John Doe",
        "doctor" => "Dr. Sarah Nkosi",
        "date" => "25 June 2026",
        "time" => "10:00",
        "type" => "New Patient",
        "priority" => "Routine",
        "medical_aid" => "Discovery Health",
        "status" => "Pending"
    ]

];

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Manage Appointments | Byte Systems
    </title>

    <link
        rel="stylesheet"
        href="../assets/css/admin.css"
    >

    <link
        rel="stylesheet"
        href="../assets/css/appointments.css"
    >

</head>


<body>

<div class="dashboard">

    <!-- SHARED SIDEBAR -->

    <?php include "../includes/sidebar.php"; ?>


    <!-- =====================================================
         MAIN CONTENT
    ====================================================== -->

    <main class="main-content appointments-main">


        <!-- PAGE TITLE -->

        <header class="appointments-heading">

            <h1>
                Manage Appointments
            </h1>

        </header>


        <!-- =================================================
             SEARCH AND FILTER BAR
        ================================================== -->

        <section class="appointment-filter-card">

            <div class="search-box">

                <svg viewBox="0 0 24 24">

                    <circle
                        cx="11"
                        cy="11"
                        r="7"
                    />

                    <path d="m20 20-4-4"/>

                </svg>

                <input
                    type="text"
                    id="appointmentSearch"
                    placeholder="Search by patient or doctor..."
                    autocomplete="off"
                >

            </div>


            <div class="filter-buttons">

                <button
                    type="button"
                    class="filter-button active"
                    data-filter="All"
                >
                    All
                </button>

                <button
                    type="button"
                    class="filter-button"
                    data-filter="Pending"
                >
                    Pending
                </button>

                <button
                    type="button"
                    class="filter-button"
                    data-filter="Confirmed"
                >
                    Confirmed
                </button>

                <button
                    type="button"
                    class="filter-button"
                    data-filter="Completed"
                >
                    Completed
                </button>

                <button
                    type="button"
                    class="filter-button"
                    data-filter="Cancelled"
                >
                    Cancelled
                </button>

            </div>

        </section>


        <!-- =================================================
             APPOINTMENT TABLE
        ================================================== -->

        <section class="appointments-table-card">

            <div class="appointments-table-wrapper">

                <table class="appointments-table">

                    <thead>

                        <tr>

                            <th>
                                PATIENT
                            </th>

                            <th>
                                DOCTOR
                            </th>

                            <th>
                                DATE &amp; TIME
                            </th>

                            <th>
                                TYPE
                            </th>

                            <th>
                                MEDICAL AID
                            </th>

                            <th>
                                STATUS
                            </th>

                            <th>
                                ACTIONS
                            </th>

                        </tr>

                    </thead>


                    <tbody id="appointmentsTableBody">

                        <?php foreach ($appointments as $appointment): ?>

                        <tr
                            class="appointment-row"
                            data-status="<?php echo htmlspecialchars($appointment['status']); ?>"
                            data-search="<?php
                                echo htmlspecialchars(
                                    strtolower(
                                        $appointment['patient'] .
                                        ' ' .
                                        $appointment['doctor']
                                    )
                                );
                            ?>"
                            data-id="<?php echo $appointment['id']; ?>"
                        >


                            <!-- PATIENT -->

                            <td class="patient-cell">

                                <?php
                                echo htmlspecialchars(
                                    $appointment['patient']
                                );
                                ?>

                            </td>


                            <!-- DOCTOR -->

                            <td>

                                <?php
                                echo htmlspecialchars(
                                    $appointment['doctor']
                                );
                                ?>

                            </td>


                            <!-- DATE -->

                            <td class="date-cell">

                                <span>
                                    <?php
                                    echo htmlspecialchars(
                                        $appointment['date']
                                    );
                                    ?>
                                </span>

                                <small>
                                    <?php
                                    echo htmlspecialchars(
                                        $appointment['time']
                                    );
                                    ?>
                                </small>

                            </td>


                            <!-- TYPE -->

                            <td>

                                <div class="appointment-type">

                                    <span>
                                        <?php
                                        echo htmlspecialchars(
                                            $appointment['type']
                                        );
                                        ?>
                                    </span>

                                    <span
                                        class="priority
                                        priority-<?php
                                            echo strtolower(
                                                str_replace(
                                                    '-',
                                                    '',
                                                    $appointment['priority']
                                                )
                                            );
                                        ?>"
                                    >
                                        <?php
                                        echo htmlspecialchars(
                                            $appointment['priority']
                                        );
                                        ?>
                                    </span>

                                </div>

                            </td>


                            <!-- MEDICAL AID -->

                            <td>

                                <?php
                                echo htmlspecialchars(
                                    $appointment['medical_aid']
                                );
                                ?>

                            </td>


                            <!-- STATUS -->

                            <td>

                                <span
                                    class="status-badge
                                    status-<?php
                                        echo strtolower(
                                            $appointment['status']
                                        );
                                    ?>"
                                >

                                    <?php
                                    echo htmlspecialchars(
                                        $appointment['status']
                                    );
                                    ?>

                                </span>

                            </td>


                            <!-- ACTIONS -->

                            <td>

                                <div class="table-actions">


                                    <!-- VIEW -->

                                    <button
                                        type="button"
                                        class="action-view"
                                        title="View appointment"
                                    >

                                        <svg viewBox="0 0 24 24">

                                            <path
                                                d="M2.5 12s3.5-5 9.5-5 9.5 5 9.5 5-3.5 5-9.5 5-9.5-5-9.5-5z"
                                            />

                                            <circle
                                                cx="12"
                                                cy="12"
                                                r="2.5"
                                            />

                                        </svg>

                                    </button>


                                    <?php if ($appointment['status'] === 'Pending'): ?>


                                        <!-- CONFIRM -->

                                        <button
                                            type="button"
                                            class="action-confirm"
                                            title="Confirm appointment"
                                        >
                                            ✓
                                        </button>


                                        <!-- CANCEL -->

                                        <button
                                            type="button"
                                            class="action-cancel"
                                            title="Cancel appointment"
                                        >
                                            ×
                                        </button>


                                    <?php elseif ($appointment['status'] === 'Confirmed'): ?>


                                        <!-- DONE -->

                                        <button
                                            type="button"
                                            class="done-button"
                                        >
                                            Done
                                        </button>


                                    <?php endif; ?>


                                </div>

                            </td>

                        </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </section>


    </main>

</div>


<!-- =========================================================
     APPOINTMENT MODAL
========================================================== -->

<div
    id="appointmentModal"
    class="modal-overlay"
    hidden
>

    <div class="appointment-modal">

        <button
            type="button"
            id="closeModal"
            class="modal-close"
        >
            ×
        </button>

        <h2>
            Appointment Details
        </h2>

        <div id="appointmentDetails"></div>

    </div>

</div>


<script>

const appointments = <?php

echo json_encode(
    $appointments,
    JSON_HEX_TAG |
    JSON_HEX_APOS |
    JSON_HEX_QUOT |
    JSON_HEX_AMP
);

?>;

</script>


<script src="../assets/js/appointments.js"></script>

</body>

</html>