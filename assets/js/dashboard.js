/* =========================================================
   DASHBOARD JAVASCRIPT
   ========================================================= */


document
    .querySelectorAll(".pending-confirm")
    .forEach(button => {

        button.addEventListener(
            "click",
            function () {

                const item =
                    this.closest(".pending-item");

                const patient =
                    item.querySelector(
                        ".pending-information strong"
                    ).textContent.trim();


                const confirmed =
                    confirm(
                        `Confirm appointment for ${patient}?`
                    );


                if (!confirmed) {

                    return;

                }


                item.style.opacity = "0";

                item.style.transition =
                    "opacity .2s ease";


                setTimeout(() => {

                    item.remove();

                }, 200);

            }

        );

    });


document
    .querySelectorAll(".pending-cancel")
    .forEach(button => {

        button.addEventListener(
            "click",
            function () {

                const item =
                    this.closest(".pending-item");

                const patient =
                    item.querySelector(
                        ".pending-information strong"
                    ).textContent.trim();


                const cancelled =
                    confirm(
                        `Cancel appointment for ${patient}?`
                    );


                if (!cancelled) {

                    return;

                }


                item.style.opacity = "0";

                item.style.transition =
                    "opacity .2s ease";


                setTimeout(() => {

                    item.remove();

                }, 200);

            }

        );

    });