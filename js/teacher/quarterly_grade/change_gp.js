
$(document).ready(function(){

   var selectedgp = $('#selected-gp').val();
   if(selectedgp == "1st_grade") {
      $("#select-gp").prop("selectedIndex", 0);
   }
   else if(selectedgp == "2nd_grade") {
      $("#select-gp").prop("selectedIndex", 1);
   }
   else if(selectedgp == "3rd_grade") {
      $("#select-gp").prop("selectedIndex", 2);
   }
   else if(selectedgp == "4th_grade") {
      $("#select-gp").prop("selectedIndex", 3);
   }else if(selectedgp == "final_grade") {
      $("#select-gp").prop("selectedIndex", 4);
   }


   $('#btn-select-gp').on('click', function(){

   var gp = $('#btn-select-gp').val();
   // $ts = $(this).closest('tr');

   // var data = $ts.children("td").map(function(){
   //     return $(this).text();
   // }).get();

   if(gp == "1st_grade") {
      $("#select-gp").prop("selectedIndex", 0);
      console.log(gp);
   }
   else if(gp == "2nd_grade") {
      $("#select-gp").prop("selectedIndex", 1);
      console.log(gp);
   }
   else if(gp == "3rd_grade") {
      $("#select-gp").prop("selectedIndex", 2);
      console.log(gp);
   }
   else if(gp == "4th_grade") {
      $("#select-gp").prop("selectedIndex", 3);
      console.log(gp);
   }else if(gp == "final_grade") {
      $("#select-gp").prop("selectedIndex", 4);
   }
   //  $("#select-gp").prop("selectedIndex", 1);
   

      // $('#update_id').val(data[0]);

   });

});