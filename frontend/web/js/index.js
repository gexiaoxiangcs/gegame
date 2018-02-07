/**
 * Created with JetBrains PhpStorm.
 * User: Ge
 * Date: 18-2-7
 * Time: 下午4:17
 * To change this template use File | Settings | File Templates.
 */
index();
function index() {
    var url = '/frontend/web/index.php?r=list/getlist';
    $.ajax({
        type  : "POST",
        url   : url,
        dataType:"json",
        data:'',
        success:function(json) {
            console.log(json);
        }

    });
}