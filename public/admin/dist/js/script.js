$(document).ready(function(){
    $("#title").keyup(function() {
        if($("#title").val()==""){
            $("#title").removeClass("is-valid");
            $("#title").addClass("is-invalid");
        }
        else{
            $("#title").removeClass("is-invalid");
            $("#title").addClass("is-valid");
        }
    });
    $("#title").focusout(function() {
        if($("#title").val()==""){
            $("#title").removeClass("is-valid");
            $("#title").addClass("is-invalid");
        }
        else{
            $("#title").removeClass("is-invalid");
            $("#title").addClass("is-valid");
        }
    });

    $('#submit').click(function(){
        if($("#title").val()==""){
            $("#title").removeClass("is-valid");
            $("#title").addClass("is-invalid");
            $("html, body").animate({scrollTop : 0},600);
            return;
        }else{
            $('#form').submit();
        }

    });
});


function validate(e) {
    if(confirm('Really block?'))
    $("#delete_"+e).submit();
}



$("#choose").click(function(){
    $(".overlay-back").css("display","block");
    $(".choose-panel").css("display","block");
    $("body").css("overflow","hidden");
});

$("#close").click(function(){
    $(".overlay-back").css("display","none");
    $(".choose-panel").css("display","none");
    $("body").css("overflow","unset");
});

$(function(){
    $('#table1').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});

