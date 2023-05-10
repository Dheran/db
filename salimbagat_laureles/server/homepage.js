$(document).ready(function() {
    let idToDelete; // Declare the idToDelete variable
    const blurContainer = $('.container-fluid');
    const deletePrompt = $('#deletePrompt');
    const updateForm = $('#update-form');
    const updateBtn = $('#updateBtn');
    const cancelDel = $('#cancelDel');
    const deleteBtn = $('#delete');

    // Click event handler for delete button
    $('button.delete-button').click(function(e) {
        e.preventDefault();
        idToDelete = $(this).val();
        blurContainer.toggleClass('blur');
        deletePrompt.toggleClass('d-none flex');
    });

    // Click event handler for update button
    $('button.update-button').click(function(e) {
        e.preventDefault();
        const buttonValue = $(this).val();
        const idInput = $("#idInput");
        const firstnameInput = $("#firstnameInput");
        const lastnameInput = $("#lastnameInput");
        const middlenameInput = $("#middlenameInput");
        const addressInput = $("#addressInput");
        const genderInput = $("#genderInput");
        const ageInput = $("#ageInput");
        const birthdateInput = $("#birthdateInput");
        const emailInput = $("#emailInput");
        const usernameInput = $("#usernameInput");
        const passwordInput = $("#passwordInput");

        blurContainer.toggleClass('blur');
        updateForm.toggleClass('d-none');

        // Set the values of the update form fields to the current record values
        idInput.val($("#id" + buttonValue).text());
        firstnameInput.val($("#firstname" + buttonValue).text());
        lastnameInput.val($("#lastname" + buttonValue).text());
        middlenameInput.val($("#middlename" + buttonValue).text());
        addressInput.val($("#address" + buttonValue).text());
        genderInput.val($("#gender" + buttonValue).text());
        ageInput.val($("#age" + buttonValue).text());
        birthdateInput.val($("#birthdate" + buttonValue).text());
        emailInput.val($("#email" + buttonValue).text());
        usernameInput.val($("#username" + buttonValue).text());
        passwordInput.val($("#password" + buttonValue).text());

        // Set the value of the update button to the id of the record to be updated
        updateBtn.val(buttonValue);
    });

    // Click event handler for cancel delete button
    cancelDel.click(function(e) {
        e.preventDefault();
        blurContainer.toggleClass('blur');
        deletePrompt.toggleClass('d-none flex');
    });

    // Click event handler for confirm delete button
    deleteBtn.click(function(e) {
        e.preventDefault();
        // Send the AJAX request to the server to delete the record with the given id
        $.ajax({
            type: "POST",
            url: "delete.php",
            data: {
                id: idToDelete
            },
            success: function(response) {
                alert("Data deleted.");
                window.location.replace("admin_homepage.php");
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

    // Submit event handler for update form
    updateBtn.click(function(e) {
        e.preventDefault();
        // Send the AJAX request to the server to update the record
        $.ajax({
            type: "POST",
            url: "server/update.php",
            data: {id: this.val()},
            success: function(response) {
                alert("Data updated.");
                window.location.replace("admin_homepage.php");
            },
            error : function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
