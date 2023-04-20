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
  const loadData = () => {
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
  loadData();

  $("#viewData").click(function (e) {
    loadData();
  });

  $("#phone").on("keypress keyup blur", function (e) {
    $(this).val(
      $(this)
        .val()
        .replace(/[^0-9\.]/g, "")
    );
  });

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
            loadData();
            M.toast({
              html: "Data Inserted!",
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
});
