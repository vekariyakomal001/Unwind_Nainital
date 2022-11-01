$(document).ready(function() {
    $('.open_submenu').click(function () {
      $('.submenu').toggle();
    });

    $('.user_role_name').on('change', function(){
      alert("Komal");
      var selected_opt = $(this).children("option:selected").val();  
      //var sel_opt = $(this).val();
      alert(selected_opt);
      if(sel_opt== "1")
      {
        $(".create_account").hide();
      }
    });
});

