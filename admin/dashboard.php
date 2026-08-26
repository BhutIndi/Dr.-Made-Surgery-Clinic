<?php

session_start();


/*
|--------------------------------------------------------------------------
| DASHBOARD DATA
|--------------------------------------------------------------------------
*/

$totalAppointments = 7;

$confirmed = 3;

$pending = 3;

$completed = 1;


$pendingAppointments = [

    [
        "id" => 1,
        "patient" => "Andie Mthembu",
        "doctor" => "Dr. Sarah Nkosi",
        "date" => "21 June 2026",
        "time" => "11:00",
        "type" => "New Patient",
        "medical_aid" => "Momentum Health"
    ],

    [
        "id" => 2,
        "patient" => "Sarah Sithole",
        "doctor" => "Dr. David Williams",
        "date" => "22 June 2026",
        "time" => "14:00",
        "type" => "Consultation",
        "medical_aid" => "Medshield"
    ],

    [
        "id" => 3,
        "patient" => "John Doe",
        "doctor" => "Dr. Sarah Nkosi",
        "date" => "25 June 2026",
        "time" => "10:00",
        "type" => "New Patient",
        "medical_aid" => "Discovery Health"
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
        Admin Dashboard | Byte Systems
    </title>

    <link
        rel="stylesheet"
        href="../assets/css/admin.css"
    >

    <link
        rel="stylesheet"
        href="../assets/css/dashboard.css"
    >

</head>


<body>

<div class="dashboard">


    <!-- =====================================================
         SIDEBAR
    ====================================================== -->

    <?php include "../includes/sidebar.php"; ?>


    <!-- =====================================================
         MAIN CONTENT
    ====================================================== -->

    <main class="main-content dashboard-content">


        <!-- =================================================
             HEADER
        ================================================== -->

        <header class="dashboard-header">

            <h1>
                Admin Dashboard
            </h1>

            <p>
                System overview — Monday, 22 June 2026
            </p>

        </header>


        <!-- =================================================
             STAT CARDS
        ================================================== -->

        <section class="stats-grid">


            <!-- TOTAL APPOINTMENTS -->

            <div class="stat-card">

                <div class="stat-icon stat-calendar">

                    <svg viewBox="0 0 24 24">

                        <rect
                            x="3"
                            y="5"
                            width="18"
                            height="16"
                            rx="2"
                        />

                        <path d="M7 3v4"/>
                        <path d="M17 3v4"/>
                        <path d="M3 10h18"/>

                    </svg>

                </div>

                <div class="stat-number">
                    <?php echo $totalAppointments; ?>
                </div>

                <div class="stat-label">
                    Total Appointments
                </div>

            </div>


            <!-- CONFIRMED -->

            <div class="stat-card">

                <div class="stat-icon stat-confirmed">

                    <svg viewBox="0 0 24 24">

                        <circle
                            cx="12"
                            cy="12"
                            r="9"
                        />

                        <path d="m8 12 3 3 5-6"/>

                    </svg>

                </div>

                <div class="stat-number">
                    <?php echo $confirmed; ?>
                </div>

                <div class="stat-label">
                    Confirmed
                </div>

            </div>


            <!-- PENDING -->

            <div class="stat-card">

                <div class="stat-icon stat-pending">

                    <svg viewBox="0 0 24 24">

                        <circle
                            cx="12"
                            cy="12"
                            r="9"
                        />

                        <path d="M12 7v5l3 2"/>

                    </svg>

                </div>

                <div class="stat-number">
                    <?php echo $pending; ?>
                </div>

                <div class="stat-label">
                    Pending Approval
                </div>

            </div>


            <!-- COMPLETED -->

            <div class="stat-card">

                <div class="stat-icon stat-completed">

                    <svg viewBox="0 0 24 24">

                        <circle
                            cx="8"
                            cy="8"
                            r="3"
                        />

                        <path
                            d="M2.5 20c.4-3.6 2.2-5.5 5.5-5.5"
                        />

                        <path
                            d="M14 16l2 2 5-6"
                        />

                    </svg>

                </div>

                <div class="stat-number">
                    <?php echo $completed; ?>
                </div>

                <div class="stat-label">
                    Completed
                </div>

            </div>

        </section>


        <!-- =================================================
             PENDING APPROVALS
        ================================================== -->

        <section class="pending-card">


            <!-- CARD HEADER -->

            <div class="pending-header">

                <h2>
                    Pending Approvals
                </h2>

                <span class="pending-count">
                    <?php echo $pending; ?> pending
                </span>

            </div>


            <!-- PENDING ITEMS -->

            <div class="pending-list">

                <?php foreach ($pendingAppointments as $appointment): ?>

                <div
                    class="pending-item"
                    data-appointment-id="<?php
                        echo $appointment['id'];
                    ?>"
                >


                    <!-- INFORMATION -->

                    <div class="pending-information">

                        <strong>
                            <?php
                            echo htmlspecialchars(
                                $appointment['patient']
                            );
                            ?>
                        </strong>

                        <span>
                            <?php
                            echo htmlspecialchars(
                                $appointment['doctor']
                            );
                            ?>

                            •

                            <?php
                            echo htmlspecialchars(
                                $appointment['date']
                            );
                            ?>

                            at

                            <?php
                            echo htmlspecialchars(
                                $appointment['time']
                            );
                            ?>
                        </span>

                        <small>
                            <?php
                            echo htmlspecialchars(
                                $appointment['type']
                            );
                            ?>

                            •

                            <?php
                            echo htmlspecialchars(
                                $appointment['medical_aid']
                            );
                            ?>
                        </small>

                    </div>


                    <!-- ACTIONS -->

                    <div class="pending-actions">


                        <!-- VIEW -->

                        <button
                            type="button"
                            class="pending-view"
                            title="View"
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


                        <!-- CONFIRM -->

                        <button
                            type="button"
                            class="pending-confirm"
                        >

                            <span>✓</span>

                            Confirm

                        </button>


                        <!-- CANCEL -->

                        <button
                            type="button"
                            class="pending-cancel"
                        >

                            <span>×</span>

                            Cancel

                        </button>

                    </div>

                </div>

                <?php endforeach; ?>

            </div>

        </section>


    </main>

</div>


<script src="../assets/js/dashboard.js"></script>

</body>

</html>