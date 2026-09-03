import { DataTable } from "@/plugins/datatable";
function createDataTable() {
    const tableTagEl = document.getElementById("tableTag");
    const tableTag = new DataTable(tableTagEl, {
        data: [],
        columns: [{ title: "Tag", data: "title" }],
    });
}

window.addEventListener("DOMContentLoaded", () => {
    createDataTable();
});