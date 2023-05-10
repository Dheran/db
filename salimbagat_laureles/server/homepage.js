$(document).ready(function() {
    let idToDelete; // Declare the idToDelete variable
    const container = $('.container-fluid');
    const deletePrompt = $('#deletePrompt');
    const updateForm = $('#update-form');
    const updateBtn = $('#updateBtn');
    const cancelDel = $('#cancelDel');
    const deleteBtn = $('#delete');
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

    // Click event handler for delete button
    $('button.delete-button').click(function(e) {
        e.preventDefault();
        idToDelete = $(this).val();
        container.toggleClass('blur');
        deletePrompt.toggleClass('d-none flex');
    });

    // Click event handler for update button
    $('button.update-button').click(function(e) {
        e.preventDefault();
        const buttonValue = $(this).val();
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
        window.location.replace("admin_dashboard.php");
    });

    // Click event handler for confirm delete button
    deleteBtn.click(function(e) {
        e.preventDefault();
        

        // baguhin mo rin sa delete ung ipopost mo sa id dapat laman  isset($_POST['id'])
        // tas sa updateBtn mo rin parang ganto dapat
        $.post("server/delete.php",
                {id : idToDelete},
                 function(data, status) {
                    alert("Data: " + data + "\nStatus: " + status);
          });
        
        // mali ata ung url mo di kailangan server/delete.php kasi nakalink ung js mo don sa admin_homepage diba bali ung page mo manggaling sya sa labas ng folder ng server
        // kaya need mo pa na specific ung sa url: "server/delete.php"
               
//         $.ajax({
//             type: "POST",
//             url: "delete.php",
//             data: {
//                 id: idToDelete
//             },
//             success: function(response) {
//                 alert("Data deleted.");
//                 window.location.replace("admin_homepage.php");
//             },
//             error: function(xhr, status, error) {
//                 console.error(error);
//             }
//         });
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
