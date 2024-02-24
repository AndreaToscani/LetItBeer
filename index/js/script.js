
/*$(function() {
    $.post('some_script.php', { width: screen.width, height:screen.height }, function(json) {
        if(json.outcome == 'success') {
            /
        } else {
            
        }
    },'json');
});*/

function red(e){
    const re = e.id;
    document.cookie='caller='+re+'; path=/'
    window.location.href = "../listarec/listarec.php";
}