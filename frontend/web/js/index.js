/**
 * Created with JetBrains PhpStorm.
 * User: Ge
 * Date: 18-2-7
 * Time: 下午4:17
 * To change this template use File | Settings | File Templates.
 */
//index();
//function index() {
//    var url = '/frontend/web/index.php?r=list/getlist';
//    $.ajax({
//        type  : "POST",
//        url   : url,
//        dataType:"json",
//        data:'',
//        success:function(json) {
//            $('.recommend').show();
//            console.log(json);
//        }
//
//    });
//}
var gc = {};
gc.apiBaseURL = "/frontend/web/index.php?r=";
gc.status = {
    ad: true,
    hot: false,
    new: true,
    oldService: true,
    newService: true,
    active: true,
    notice: true,
    gift: true,
    userRule: true,
    pointGift: true,
    pointReal: true,
    pointLog: true,
    pointExchangeLog: true,
    pointGetLog: true,
    getUserInfo: true,
    sign: false,
    bindPhone: true,
    verify: true
};
gc.pointGiftError = function (error) {
    switch (parseInt(error)) {
        case 1:
            sdk.confirmDialog("出了一点小状况");
            break;
        case 2:
            sdk.confirmDialog("缺少必要参数");
            break;
        case 3:
            sdk.confirmDialog("请重新登录");
            break;
        case 4:
            sdk.confirmDialog("非法参数");
            break;
        case 5:
            sdk.confirmDialog("礼包不存在");
            break;
        case 6:
            sdk.confirmDialog("兑换次数超过每日上限");
            break;
        case 7:
            sdk.confirmDialog("兑换次数超过上限");
            break;
        case 8:
            sdk.confirmDialog("积分不足");
            break;
        case 9:
            sdk.confirmDialog("礼包不足");
            break;
        case 10:
            sdk.confirmDialog("游戏礼包暂未开放");
            break;
        case 11:
            sdk.confirmDialog("角色不存在");
            break;
        case 12:
            sdk.confirmDialog("您的VIP等级不足");
            break;
        case 14:
            sdk.confirmDialog("手机号码有误");
            break;
        case 60001:
            break;
        default:
            sdk.confirmDialog("未知错误，请联系客服")
    }
};
gc.httpGet = function (url, callback) {
    $.get(url + "&v=" + Date.now(), function (data) {
        if (data.error) {
            if (parseInt(data.error) < 15) {
                gc.pointGiftError(data.error)
            }
        } else {
            callback(data)
        }
    }, "json")
};
gc.slider = function (data) {
    var t = "";
    for (var i in data) {
        t += "<li><a onclick=gc.rebuildGameURL('" + data[i].link_url + "') href='javascript:;'><img src=" + data[i].ad_pic_url +" ></a></li>";
    }
    $(".slide-banner ol").append(t);
    if (data.length > 1) {
        TouchSlide({
            slideCell: "#slide",
            titCell: ".hd ul",
            mainCell: ".bd ol",
            effect: "leftLoop",
            interTime: 4e3,
            autoPage: true,
            autoPlay: true
        })
    }
};
gc.rebuildGameURL = function (url, e, args) {
    location.href = url;
    return;
}
gc.getPageBase = function () {
        gc.httpGet(gc.apiBaseURL + "/list/getad", function (data) {
            gc.status.ad = false;
            data = data.data;
            gc.adList = data.ad;
            gc.recentList = data.recent_play;
            var count = 0;
            var _count = 0;
            gc.slider(gc.adList);
            gc.show(0,2,0);
        })
};

gc.loadGameHot = function () {
        gc.httpGet(gc.apiBaseURL + "/list/getlist" + gc.page.hot + "&pageSize=" + gc.pageSize, function (data) {
            var t = "";
            data = data.data;
            gc.status.hot = false;
            if (data && data.length) {
                for (var i in data) {
                    t += '<li class="flex"><div class="new">';
                    if (Date.parse(gc.time) / 1e3 - data[i].recoEndTime < 7 * 24 * 3600) {
                        t += "<i>新游</i>"
                    }
                    t += '<img class="r5" onclick="gc.loadGameInfo(' + data[i].id + ",this,['热门','icon区域'])\" src=\"" + data[i].icon + '"></div>';
                    t += '<div onclick="gc.loadGameInfo(' + data[i].id + ',this,[\'热门\',\'标题区域\'])" class="flex flex-list flex-v"><p class="title"><span>' + data[i].title + "</span>";
                    t += gc.addLabels(data[i].labels);
                    t += "</p>";
                    if (data[i].brief_intro) {
                        t += "<p>" + data[i].brief_intro + "</p>"
                    }
                    t += "</div><a onclick=\"gc.rebuildGameURL('" + data[i].game_url + "',this,['热门','开始按钮'])\" href=\"javascript:;\" class=\"btn r3\">开始</a></li>"
                }
                $("#hot-box").append(t);
                $("#hot-box li.end").remove();
                if (data.length >= gc.pageSize) {
                    gc.page.hot++;
                    gc.isReady = true;
                    $("#hot-box").append('<li class="end"><fieldset><legend>松开手自动加载</legend></fieldset></li>')
                } else {
                    gc.page.hot = false;
                    $("#hot-box").append('<li class="end"><fieldset><legend>没有更多了</legend></fieldset></li>')
                }
            } else {
                gc.page.hot = false;
                $("#hot-box li.end legend").text("没有更多了")
            }
        })
};

gc.show = function(boxIndex,navIndex,subNavIndex) {
    var obj = $("#box-" + boxIndex + " .show-tab>*").eq(subNavIndex);
    $("#box-" + boxIndex).removeClass("hide").siblings().addClass("hide");
    $("#box-" + boxIndex + " ol.nav li").eq(subNavIndex).addClass("active").siblings().removeClass("active");
    obj.removeClass("hide").siblings().addClass("hide");
    $(".footer-nav li").eq(navIndex).addClass("active").siblings().removeClass("active")
}

gc.getPageBase();
gc.loadGameHot();