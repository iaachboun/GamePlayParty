$("#userSelectClass").change(function(){
    if($(this).val() == 'Biscoop beheerder'){
        $("#userSelectBiosGroup").show();
        console.log('test');
    }else{
        $("#userSelectBiosGroup").hide();
    }
});

$('#homeContent').find("p").find('img').addClass("col-12");

$('#homeContent').find("p").find('img').removeAttr("width, height");

$('.detailContent').find("p").find('img').addClass("col-12");
$('.detailContent').find("p").find('img').removeAttr("width, height");
