/* =========================================================
   PATIENT MANAGEMENT JAVASCRIPT
   ========================================================= */


/* =========================================================
   ELEMENTS
   ========================================================= */

const patientSearch =
    document.getElementById(
        "patientSearch"
    );


const patientRows =
    document.querySelectorAll(
        ".patient-row"
    );


const noPatients =
    document.getElementById(
        "noPatients"
    );


const patientModal =
    document.getElementById(
        "patientModal"
    );


const patientModalContent =
    document.getElementById(
        "patientModalContent"
    );


const closePatientModal =
    document.getElementById(
        "closePatientModal"
    );


/* =========================================================
   SEARCH PATIENTS
   ========================================================= */

patientSearch.addEventListener(
    "input",
    function () {

        const searchTerm =
            this.value
                .trim()
                .toLowerCase();


        let visiblePatients = 0;


        patientRows.forEach(row => {

            const searchableText =
                row.dataset.search;


            if (
                searchableText.includes(
                    searchTerm
                )
            ) {

                row.style.display = "";

                visiblePatients++;

            } else {

                row.style.display = "none";

            }

        });


        if (visiblePatients === 0) {

            noPatients.hidden = false;

        } else {

            noPatients.hidden = true;

        }

    }
);


/* =========================================================
   VIEW RECORDS
   ========================================================= */

document
    .querySelectorAll(".view-records-button")
    .forEach(button => {

        button.addEventListener(
            "click",
            function () {

                const patientId =
                    parseInt(
                        this.dataset.id
                    );


                const patient =
                    patients.find(
                        item =>
                            parseInt(
                                item.id
                            ) === patientId
                    );


                if (!patient) {

                    return;

                }


                patientModalContent.innerHTML = `

                    <div class="patient-record-row">

                        <strong>
                            Patient
                        </strong>

                        <span>
                            ${escapeHTML(
                                patient.name
                            )}
                        </span>

                    </div>


                    <div class="patient-record-row">

                        <strong>
                            Date of Birth
                        </strong>

                        <span>
                            ${escapeHTML(
                                patient.dob
                            )}
                        </span>

                    </div>


                    <div class="patient-record-row">

                        <strong>
                            Email
                        </strong>

                        <span>
                            ${escapeHTML(
                                patient.email
                            )}
                        </span>

                    </div>


                    <div class="patient-record-row">

                        <strong>
                            Phone
                        </strong>

                        <span>
                            ${escapeHTML(
                                patient.phone
                            )}
                        </span>

                    </div>


                    <div class="patient-record-row">

                        <strong>
                            Medical Aid
                        </strong>

                        <span>
                            ${escapeHTML(
                                patient.medical_aid
                            )}
                        </span>

                    </div>


                    <div class="patient-record-row">

                        <strong>
                            Medical Aid Number
                        </strong>

                        <span>
                            ${escapeHTML(
                                patient.medical_aid_number
                            )}
                        </span>

                    </div>


                    <div class="patient-record-row">

                        <strong>
                            Blood Type
                        </strong>

                        <span>
                            ${escapeHTML(
                                patient.blood_type
                            )}
                        </span>

                    </div>


                    <div class="patient-record-row">

                        <strong>
                            Appointments
                        </strong>

                        <span>
                            ${escapeHTML(
                                patient.appointments
                            )}
                            total
                        </span>

                    </div>

                `;


                patientModal.hidden = false;


                document.body.style.overflow =
                    "hidden";

            }
        );

    });


/* =========================================================
   CLOSE MODAL
   ========================================================= */

closePatientModal.addEventListener(
    "click",
    closePatientRecords
);


patientModal.addEventListener(
    "click",
    function (event) {

        if (
            event.target === patientModal
        ) {

            closePatientRecords();

        }

    }
);


document.addEventListener(
    "keydown",
    function (event) {

        if (
            event.key === "Escape" &&
            !patientModal.hidden
        ) {

            closePatientRecords();

        }

    }
);


function closePatientRecords() {

    patientModal.hidden = true;

    document.body.style.overflow = "";

}


/* =========================================================
   HTML ESCAPING
   ========================================================= */

function escapeHTML(value) {

    return String(value)

        .replaceAll(
            "&",
            "&amp;"
        )

        .replaceAll(
            "<",
            "&lt;"
        )

        .replaceAll(
            ">",
            "&gt;"
        )

        .replaceAll(
            '"',
            "&quot;"
        )

        .replaceAll(
            "'",
            "&#039;"
        );

}