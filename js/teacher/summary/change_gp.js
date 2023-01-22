
$(document).ready(function(){

    var selectedgp = $('#selected-gp').val();
    var section_id = $('#current-section-id').val();
    var summary_id = $('#summary-id').val();

    if(summary_id == "1st_grade") {
        $("#select-gp").prop("selectedIndex", 0);
     }
     else if(summary_id == "2nd_grade") {
        $("#select-gp").prop("selectedIndex", 1);
     }
     else if(summary_id == "3rd_grade") {
        $("#select-gp").prop("selectedIndex", 2);
     }
     else if(summary_id == "4th_grade") {
        $("#select-gp").prop("selectedIndex", 3);
     }else if(summary_id == "final_grade") {
        $("#select-gp").prop("selectedIndex", 4);
     }


    $('#select-gp').on('change', function(){
    var gp = $('#select-gp').val();

     if(gp == "1st_grade") {
        $("#select-gp").prop("selectedIndex", 0);
        location.href = "view_class.php?section_id=" + section_id + "&summary_period=1st_grade";
     }
     else if(gp == "2nd_grade") {
        $("#select-gp").prop("selectedIndex", 1);
        location.href = "view_class.php?section_id=" + section_id + "&summary_period=2nd_grade";
     }
     else if(gp == "3rd_grade") {
        $("#select-gp").prop("selectedIndex", 2);
        location.href = "view_class.php?section_id=" + section_id + "&summary_period=3rd_grade";
        
     }
     else if(gp == "4th_grade") {
        $("#select-gp").prop("selectedIndex", 3);
        location.href = "view_class.php?section_id=" + section_id + "&summary_period=4th_grade";
        
     }else if(gp == "final_grade") {
      $("#select-gp").prop("selectedIndex", 4);
      location.href = "view_class.php?section_id=" + section_id + "&summary_period=final_grade";
   }
    //  $("#select-gp").prop("selectedIndex", 1);
     

        // $('#update_id').val(data[0]);

    });

});