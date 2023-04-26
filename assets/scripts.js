$(document).ready(function () {
  let loader = `
  <div class="center" id="loading" style="display: none; padding: 20px;">
    <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-blue-only">
        <div class="circle-clipper left">
            <div class="circle"></div>
        </div><div class="gap-patch">
            <div class="circle"></div>
        </div><div class="circle-clipper right">
            <div class="circle"></div>
        </div>
        </div>
    </div>
  </div>
  `;
  const loadRecords = () => {
    $.ajax({
      url: "load-data.php",
      type: "POST",
      // beforeSend: function () {
      //   $("#table-data").html($(loader).show(300));
      // },
      success: function (data) {
        $("#loading").hide(300);
        $("#table-data > #loading").remove();
        $("#table-data").html(data);
        // setTimeout(() => {}, 3000);
        // console.log(data);
      },
    });
  };
  loadRecords(); // Loading records

  $("#viewData").click(function (e) {
    loadRecords();
  });

  $("#phone").on("keypress keyup blur", function (e) {
    $(this).val(
      $(this)
        .val()
        .replace(/[^0-9\.]/g, "")
    );
  });

  // Insert Records
  $("button#save").click(function (e) {
    e.preventDefault();
    let name = $("#name").val();
    let phone = $("#phone").val();
    let sclass = $("#class").val();

    let fieldErrors = [
      "Name is empty!",
      "Phone Number is empty!",
      "Class is empty",
    ];

    // If Name field is empty
    if (name == "") {
      $("#name").after(
        `<small class="name_empty error_txt red-text">${fieldErrors[0]}</small>`
      );
      $("#name").addClass("invalid");
      $("#name + .error_txt").hide();
      if ($(".name_empty").length > 1) {
        $("#name + .error_txt:not(:last-child)").remove();
      }
      $("#name + .error_txt").slideDown(300);
    } else {
      $("#name").removeClass("invalid");
    }

    $("#name").on("keypress blur keyup", function () {
      $("#name + .error_txt").slideUp(300);
      $("#name").removeClass("invalid");
    });

    // If Phone field is empty
    if (phone == "") {
      $("#phone").after(
        `<small class="phone_empty error_txt red-text">${fieldErrors[1]}</small>`
      );
      $("#phone").addClass("invalid");
      $("#phone + .error_txt").hide();
      if ($(".phone_empty").length > 1) {
        $("#phone + .error_txt:not(:last-child)").remove();
      }
      $("#phone + .error_txt").slideDown(300);
    } else {
      $("#phone").removeClass("invalid");
    }

    $("#phone").on("keypress blur keyup", function () {
      $("#phone + .error_txt").slideUp(300);
      $("#phone").removeClass("invalid");
    });

    // If Class field is empty
    if (sclass == "") {
      $("#class").after(
        `<small class="class_empty error_txt red-text">${fieldErrors[2]}</small>`
      );
      $("#class").addClass("invalid");
      $("#class + .error_txt").hide();
      if ($(".class_empty").length > 1) {
        $("#class + .error_txt:not(:last-child)").remove();
      }
      $("#class + .error_txt").slideDown(300);
    } else {
      $("#class").removeClass("invalid");
    }

    $("#class").on("keypress blur keyup", function () {
      $("#class + .error_txt").slideUp(300);
      $("#class").removeClass("invalid");
    });

    if (name == "" || phone == "" || sclass == "") {
      M.toast({
        html: "Fill all the fields!",
        classes: "rounded red lighten-1",
        displayLength: 3000,
      });
    } else {
      $.ajax({
        url: "insert-data.php",
        type: "POST",
        data: { name: name, phone: phone, class: sclass },
        success: function (data) {
          if (data == 1) {
            $("#addForm").trigger("reset");
            // console.log("data added!");
            $("html, body").animate(
              {
                scrollTop: $("#viewDataRecord").offset().top,
              },
              1000
            );
            loadRecords();
            M.toast({
              html: "Data Added!",
              classes: "rounded green accent-4",
              displayLength: 2000,
            });
          } else {
            M.toast({
              html: "There's an error while adding the data!",
              classes: "rounded red lighten-1",
              displayLength: 3000,
            });
            console.log("Error while adding data!");
            // console.warn(data);
          }
        },
      });
    }
  });

  // Delete Record Get
  $(document).on("click", "a.delete", function () {
    let studentID = $(this).data("id");
    $(".delete_confirm").attr("data-id", studentID);
    let sname = $(`tr[s-data-id=${studentID}] > td:nth-child(2)`).text();
    let sphone = $(`tr[s-data-id=${studentID}] > td:nth-child(3)`).text();
    let sclass = $(`tr[s-data-id=${studentID}] > td:nth-child(4)`).text();
    $("#sname").text(sname);
    $("#sphone").text(sphone);
    $("#sclass").text(sclass);
    // console.log(Number(modalDelete.attr("data-id")));
    // console.log(studentID);
  });

  // Delete Record
  $(".delete_confirm").click(function () {
    let studentID = Number($(this).attr("data-id"));
    $.ajax({
      url: "delete-data.php",
      type: "POST",
      data: { id: studentID },
      success: function (data) {
        console.log(studentID);
        if (data == 1) {
          console.log("deleted!");
          loadRecords();
        } else {
          console.warn("Unable to delete records!");
        }
      },
    });
  });

  // Edit Record Get
  $(document).on("click", "a.edit", function () {
    let studentID = $(this).data("id");
    $(".edit_confirm").attr("data-id", studentID);
    let sname = $(`tr[s-data-id=${studentID}] > td:nth-child(2)`).text();
    let sphone = $(`tr[s-data-id=${studentID}] > td:nth-child(4)`).text();
    let sclass = $(`tr[s-data-id=${studentID}] > td:nth-child(3)`).text();
    $("#e-name").val(sname);
    $("#e-phone").val(sphone);
    $("#e-class").val(sclass);

    // Dont hide button if any of field value is empty
    if (
      $("#e-name").val() !== "" ||
      $("#e-phone").val() !== "" ||
      $("#e-class").val() !== ""
    ) {
      $(".confirm_box .edit_confirm").fadeIn(0);
    }
  });

  // Hide Save button if user empty edit fields
  /*
  $("#e-name").on("keyup", function (e) {
    console.log(e.target.value);
    if (e.target.value === "") {
      $(".confirm_box .edit_confirm").fadeOut(300);
    } else {
      $(".confirm_box .edit_confirm").fadeIn(300);
    }
  });

  $("#e-phone").on("keyup", function (e) {
    console.log(e.target.value);
    if (e.target.value === "") {
      $(".confirm_box .edit_confirm").fadeOut(300);
    } else {
      $(".confirm_box .edit_confirm").fadeIn(300);
    }
  });

  $("#e-class").on("keyup", function (e) {
    console.log(e.target.value);
    if (e.target.value === "") {
      $(".confirm_box .edit_confirm").fadeOut(300);
    } else {
      $(".confirm_box .edit_confirm").fadeIn(300);
    }
  });
  */
  $("#e-name, #e-phone, #e-class").on("keyup", function (e) {
    let name = $("#e-name").val();
    let phone = $("#e-phone").val();
    let sclass = $("#e-class").val();
    // if ($(this).val().trim() === "") {
    //   console.log("You put only white space");
    //   console.log($(this).val().trim());
    // }
    if (name === "" || phone === "" || sclass === "") {
      $(".confirm_box .edit_confirm").fadeOut(300);
    } else if (
      name.trim() === "" ||
      phone.trim() === "" ||
      sclass.trim() === ""
    ) {
      $(".confirm_box .edit_confirm").fadeOut(300);
    } else {
      $(".confirm_box .edit_confirm").fadeIn(300);
    }
  });

  // Edit Save
  $(".edit_confirm").click(function () {
    let studentID = Number($(this).attr("data-id"));
    let name = $("#e-name").val();
    let phone = $("#e-phone").val();
    let sclass = $("#e-class").val();

    $.ajax({
      url: "edit-data.php",
      type: "POST",
      data: { id: studentID, name, phone, class: sclass },
      success: function (data) {
        // console.log(studentID);
        if (data == 1) {
          M.toast({
            html: "Student ID:" + studentID + " Record Updated!",
            classes: "rounded green accent-2 black-text",
            displayLength: 3000,
          });
          loadRecords();
        } else {
          console.warn("Unable to edit record!");
        }
      },
    });
  });

  $("#search").on("keyup", function () {
    let searchTerm = $(this).val();
    if (searchTerm === "") {
      loadRecords();
    } else {
      $.ajax({
        url: "search.php",
        method: "POST",
        data: { searchTerm: searchTerm },
        success: function (data) {
          $("#table-data").empty();
          $("#table-data").html(data);
        },
      });
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  var elems = document.querySelectorAll(".modal");
  M.Modal.init(elems);
  // var elem = document.getElementById("modal1");
  // var instance = M.Modal.getInstance(elem)
  // console.log(instance.close());
});
