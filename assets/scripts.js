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
  $("#viewData").click(function (e) {
    $.ajax({
      url: "load-data.php",
      type: "POST",
      beforeSend: function () {
        $("#table-data").html($(loader).show(300));
      },
      success: function (data) {
        $("#loading").hide(300);
        $("#table-data > #loading").remove();
        $("#table-data").html(data);
        // setTimeout(() => {}, 3000);
        // console.log(data);
      },
    });
  });
});
