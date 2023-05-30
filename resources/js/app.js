import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import { forEach } from "lodash";
import.meta.glob(["../img/**"]);

const btns = document.querySelectorAll(".delete");

btns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
        e.preventDefault();

        const dataTitle = btn.getAttribute("data-item-title");

        const modal = document.getElementById("deleteModal");

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        const modalITxt = modal.querySelector("#modal-txt");
        modalITxt.textContent = dataTitle;

        const btnDelete = modal.querySelector("button.btn-primary");

        btnDelete.addEventListener("click", () => {
            btn.parentElement.submit();
        });
    });
});
