  $(document).ready(function(){

    function get_data(id = '', suraa_no, result_box_id){
      $.ajax({
          async: false,
          cache: false,
          type : 'POST',
          url  : 'response.php',
          data : {
            suraa_no : suraa_no
          },
          success: function(response){
            $(id).html(response) ;
            $(id).selectpicker('refresh');
            $(result_box_id).val('');
            $("#serial-num").val('');
            $("#comments").val('');
            $("#notes").val('');
            return false; 
          }
      }); 
    }

    function change_suraa(){
       var suraa_no = $("#suraa").val();
       get_data('#ayat-sura-a', suraa_no, '#text_suraa_ayat_a');
       
    }

    function change_surab(){
       var suraa_no = $("#surab").val();
       get_data('#ayat-sura-b', suraa_no, "#text_surab_ayat_b");
       
    }

    $("#suraa").change(change_suraa);
    $("#surab").change(change_surab);
  });

  function get_ayat_text(id = '', suraa_no, ayat_no){
    $.ajax({
        async: false,
        cache: false,
        type : 'POST',
        url  : 'response.php',
        data : {
          suraa_no : suraa_no,
          ayat_no  : ayat_no
        },
        success: function(response){
          $(id).val(response) ;
          return false; 
        }
    }); 
  }

  function get_seriral_notes_comments(serial_no_box_id = '', note_box_id = '', comment_box_id = '', sura_a, ayat_a, sura_b, ayat_b){
    $.ajax({
        async: false,
        cache: false,
        type : 'POST',
        url  : 'response.php',
        data : {
          sura_a : sura_a,
          ayat_a : ayat_a,
          sura_b : sura_b,
          ayat_b : ayat_b
        },
        success: function(response){
          if(response){
            var response = JSON.parse(response);
            $(serial_no_box_id).val(response.serial_no);
            $(comment_box_id).val(response.comments);
            $(note_box_id).val(response.notes);
          } else {
            $(serial_no_box_id).val('');
            $(comment_box_id).val('');
            $(note_box_id).val('');
          }
          
          return false; 
        }
    }); 
  }

  function fill_notes_comment_boxes(){
    if(
      $('#suraa').val() 
      && $("#ayat-sura-a").val() 
      && $('#surab').val() 
      && $("#ayat-sura-b").val()
    ) {
      var sura_a = $('#suraa').val();
      var ayat_a = $('#ayat-sura-a').val();
      var sura_b = $('#surab').val();
      var ayat_b = $('#ayat-sura-b').val();

      get_seriral_notes_comments('#serial-num', '#notes', '#comments', sura_a, ayat_a, sura_b, ayat_b)
    }
  }
  
  $("#ayat-sura-a").on('change', function(){
    if($('#suraa').val()){
      var sura_no = $('#suraa').val();
      var ayat_no = $('#ayat-sura-a').val();
      get_ayat_text("#text_suraa_ayat_a", sura_no, ayat_no);
      fill_notes_comment_boxes();
    }
  })

  $("#ayat-sura-b").on('change', function(){
    if($('#surab').val()){
      var sura_no = $('#surab').val();
      var ayat_no = $('#ayat-sura-b').val();
      get_ayat_text("#text_surab_ayat_b", sura_no, ayat_no);
      fill_notes_comment_boxes();
    }
  })
