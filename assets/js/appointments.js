/* =========================================================
   MANAGE APPOINTMENTS JAVASCRIPT
   ========================================================= */


const searchInput =
    document.getElementById("appointmentSearch");

const filterButtons =
    document.querySelectorAll(".filter-button");

const appointmentRows =
    document.querySelectorAll(".appointment-row");

const modal =
    document.getElementById("appointmentModal");

const modalContent =
    document.getElementById("appointmentDetails");

const closeModalButton =
    document.getElementById("closeModal");


let currentFilter = "All";


/* =========================================================
   FILTER APPOINTMENTS
   ========================================================= */

function filterAppointments() {

    const searchTerm =
        searchInput.value
            .trim()
            .toLowerCase();


    appointmentRows.forEach(row => {

        const status =
            row.dataset.status;

        const searchText =
            row.dataset.search;

        const matchesFilter =
            currentFilter === "All" ||
            status === currentFilter;

        const matchesSearch =
            searchText.includes(searchTerm);

        if (
            matchesFilter &&
            matchesSearch
        ) {

            row.style.display = "";

        } else {

            row.style.display = "none";

        }

    });

}


/* =========================================================
   SEARCH
   ========================================================= */

searchInput.addEventListener(
    "input",
    filterAppointments
);


/* =========================================================
   FILTER BUTTONS
   ========================================================= */

filterButtons.forEach(button => {

    button.addEventListener(
        "click",
        function () {

            filterButtons.forEach(item => {

                item.classList.remove("active");

            });

            this.classList.add("active");

            currentFilter =
                this.dataset.filter;

            filterAppointments();

        }
    );

});


/* =========================================================
   VIEW APPOINTMENT
   ========================================================= */

document.querySelectorAll(".action-view")
    .forEach(button => {

        button.addEventListener(
            "click",
            function () {

                const row =
                    this.closest(".appointment-row");

                const id =
                    parseInt(row.dataset.id);

                const appointment =
                    appointments.find(
                        item =>
                            parseInt(item.id) === id
                    );

                if (!appointment) {
                    return;
                }

                modalContent.innerHTML = `

                    <div class="modal-row">
                        <strong>Patient</strong>
                        <span>
                            ${escapeHTML(appointment.patient)}
                        </span>
                    </div>

                    <div class="modal-row">
                        <strong>Doctor</strong>
                        <span>
                            ${escapeHTML(appointment.doctor)}
                        </span>
                    </div>

                    <div class="modal-row">
                        <strong>Date & Time</strong>
                        <span>
                            ${escapeHTML(appointment.date)}
                            at
                            ${escapeHTML(appointment.time)}
                        </span>
                    </div>

                    <div class="modal-row">
                        <strong>Appointment Type</strong>
                        <span>
                            ${escapeHTML(appointment.type)}
                        </span>
                    </div>

                    <div class="modal-row">
                        <strong>Priority</strong>
                        <span>
                            ${escapeHTML(appointment.priority)}
                        </span>
                    </div>

                    <div class="modal-row">
                        <strong>Medical Aid</strong>
                        <span>
                            ${escapeHTML(appointment.medical_aid)}
                        </span>
                    </div>

                    <div class="modal-row">
                        <strong>Status</strong>
                        <span>
                            ${escapeHTML(appointment.status)}
                        </span>
                    </div>

                `;

                modal.hidden = false;

                document.body.style.overflow = "hidden";

            }
        );

    });


/* =========================================================
   CONFIRM
   ========================================================= */

document.querySelectorAll(".action-confirm")
    .forEach(button => {

        button.addEventListener(
            "click",
            function () {

                const row =
                    this.closest(".appointment-row");

                const id =
                    parseInt(row.dataset.id);

                const appointment =
                    appointments.find(
                        item =>
                            parseInt(item.id) === id
                    );

                if (!appointment) {
                    return;
                }

                const confirmed =
                    confirm(
                        `Confirm appointment for ${appointment.patient}?`
                    );

                if (!confirmed) {
                    return;
                }

                /*
                 * TEMPORARY GUI ACTION.
                 *
                 * Later this becomes:
                 *
                 * fetch("update_appointment.php", {
                 *     method: "POST",
                 *     ...
                 * });
                 */

                row.dataset.status = "Confirmed";

                const status =
                    row.querySelector(".status-badge");

                status.textContent = "Confirmed";

                status.className =
                    "status-badge status-confirmed";

                this.remove();

                const cancel =
                    row.querySelector(".action-cancel");

                if (cancel) {
                    cancel.remove();
                }

                const actions =
                    row.querySelector(".table-actions");

                const done =
                    document.createElement("button");

                done.className = "done-button";

                done.textContent = "Done";

                actions.appendChild(done);

                appointment.status = "Confirmed";

                filterAppointments();

            }
        );

    });


/* =========================================================
   CANCEL
   ========================================================= */

document.querySelectorAll(".action-cancel")
    .forEach(button => {

        button.addEventListener(
            "click",
            function () {

                const row =
                    this.closest(".appointment-row");

                const id =
                    parseInt(row.dataset.id);

                const appointment =
                    appointments.find(
                        item =>
                            parseInt(item.id) === id
                    );

                if (!appointment) {
                    return;
                }

                const cancelled =
                    confirm(
                        `Cancel appointment for ${appointment.patient}?`
                    );

                if (!cancelled) {
                    return;
                }

                row.dataset.status = "Cancelled";

                const status =
                    row.querySelector(".status-badge");

                status.textContent = "Cancelled";

                status.className =
                    "status-badge status-cancelled";

                const confirmButton =
                    row.querySelector(".action-confirm");

                if (confirmButton) {
                    confirmButton.remove();
                }

                this.remove();

                appointment.status = "Cancelled";

                filterAppointments();

            }
        );

    });


/* =========================================================
   CLOSE MODAL
   ========================================================= */

closeModalButton.addEventListener(
    "click",
    closeModal
);


modal.addEventListener(
    "click",
    function (event) {

        if (event.target === modal) {

            closeModal();

        }

    }
);


document.addEventListener(
    "keydown",
    function (event) {

        if (
            event.key === "Escape" &&
            !modal.hidden
        ) {

            closeModal();

        }

    }
);


function closeModal() {

    modal.hidden = true;

    document.body.style.overflow = "";

}


/* =========================================================
   HTML ESCAPE
   ========================================================= */

function escapeHTML(value) {

    return String(value)

        .replaceAll("&", "&amp;")

        .replaceAll("<", "&lt;")

        .replaceAll(">", "&gt;")

        .replaceAll('"', "&quot;")

        .replaceAll("'", "&#039;");

}