<?php

$currentPage = basename($_SERVER['PHP_SELF']);

?>

<aside class="sidebar">

    <!-- =====================================================
         LOGO
    ====================================================== -->

    <div class="logo-section">

        <div class="logo-icon">

            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M12 21s-7.5-4.7-9.5-9.4C.8 7.9 3.2 4 7.1 4c2.2 0 3.9 1.2 4.9 2.9C13 5.2 14.7 4 16.9 4c3.9 0 6.3 3.9 4.6 7.6C19.5 16.3 12 21 12 21z"/>
            </svg>

        </div>

        <div class="logo-text">

            <h2>Byte Systems</h2>

            <span>SURGICAL CLINIC</span>

        </div>

    </div>


    <!-- =====================================================
         ADMIN USER
    ====================================================== -->

    <div class="admin-user">

        <div class="admin-avatar">
            A
        </div>

        <div class="admin-details">

            <strong>
                Admin User
            </strong>

            <span>
                System Administrator
            </span>

        </div>

    </div>


    <!-- =====================================================
         NAVIGATION
    ====================================================== -->

    <nav class="sidebar-navigation">


        <!-- OVERVIEW -->

        <a
            href="dashboard.php"
            class="navigation-item <?php
                echo $currentPage === 'dashboard.php'
                    ? 'active'
                    : '';
            ?>"
        >

            <span class="navigation-icon">

                <svg viewBox="0 0 24 24">

                    <path d="M2 12h4l2-7 4 14 2-7h8"/>

                </svg>

            </span>

            <span>
                Overview
            </span>

        </a>


        <!-- APPOINTMENTS -->

        <a
            href="appointments.php"
            class="navigation-item <?php
                echo $currentPage === 'appointments.php'
                    ? 'active'
                    : '';
            ?>"
        >

            <span class="navigation-icon">

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

            </span>

            <span>
                Appointments
            </span>

        </a>


        <!-- PATIENT MANAGEMENT -->

        <a
            href="patient-management.php"
            class="navigation-item <?php
                echo $currentPage === 'patient-management.php'
                    ? 'active'
                    : '';
            ?>"
        >

            <span class="navigation-icon">

                <svg viewBox="0 0 24 24">

                    <circle
                        cx="9"
                        cy="8"
                        r="3"
                    />

                    <circle
                        cx="17"
                        cy="9"
                        r="2.5"
                    />

                    <path
                        d="M3.5 20c.5-3.3 2.4-5 5.5-5s5 1.7 5.5 5"
                    />

                    <path
                        d="M14 16c.8-.7 1.8-1 3-1 2.4 0 3.8 1.6 4.2 4"
                    />

                </svg>

            </span>

            <span>
                Patient Management
            </span>

        </a>

    </nav>


    <!-- =====================================================
         SIGN OUT
    ====================================================== -->

    <div class="sidebar-bottom">

        <a
            href="logout.php"
            class="sign-out"
            onclick="return confirm('Are you sure you want to sign out?');"
        >

            <span class="navigation-icon">

                <svg viewBox="0 0 24 24">

                    <path
                        d="M9 5H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h4"
                    />

                    <path
                        d="M14 8l4 4-4 4"
                    />

                    <path
                        d="M18 12H9"
                    />

                </svg>

            </span>

            <span>
                Sign Out
            </span>

        </a>

    </div>

</aside>