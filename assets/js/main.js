$("#userSelectClass").change(function(){
    if($(this).val() == 'Biscoop beheerder'){
        $("#userSelectBiosGroup").show();
        console.log('test');
    }else{
        $("#userSelectBiosGroup").hide();
    }
});
