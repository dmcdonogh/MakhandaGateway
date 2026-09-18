const role = document.getElementById("signup-userrole");
const wardOption = document.getElementById("signup-ward-option");

role.addEventListener("change", function() {
    if (role.value === "Community Member"
        || role.value === "Ward Councillor") {
        wardOption.style.display = "table-row";
        console.log("Role: ", role.value);
        console.log("Ward Option: ", wardOption.value);
    } else {
        wardOption.style.display = "none";
    }
});