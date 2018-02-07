
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1,minimal-ui">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="format-detection" content="telephone=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="gegamer">
    <meta http-equiv="pragma" content="no-cache"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="cache" content="no-cache"/>
    <meta http-equiv="expires" content="0"/>
    <meta name="keywords" content="gegamer"/>
    <meta name="description" content="gegamer"/>
    <link href="//cdn.11h5.com/static/css/common.css?v=11" rel="stylesheet">
    <link href="./css/styles.css?ver=20180104001" rel="stylesheet">
</head>
<body>
<div class="topBar">
    <div class="flex">
        <div></div>
        <div class="downQrcode">
            <div></div>
        </div>
    </div>
</div>
<div class="wrap-box">
    <div class="wrap">
        <div id="scroll">
            <div id="box-1" class="">
                <div id="slide" class="slide-banner">
                    <div class="bd"><ol></ol></div>
                    <div class="hd"><ul class="flex"></ul></div>
                </div>
                <dl class="recommend">
                    <dt><em>最<br>近<br>在<br>玩</em></dt>
                    <dd id="wrapper-rec">
                        <ol class="unselect flex"></ol>
                    </dd>
                </dl>
                <ol class="flex nav">
                    <li class="flex-list"><a href="#">热门</a></li>
                    <li class="flex-list" data-type="3"><a href="#new">新上架</a></li>
                    <li class="flex-list"><a href="#active">活动</a></li>
                    <li class="flex-list" data-type="4"><a href="#oldService">新开服</a></li>
                </ol>
                <div class="show-box show-tab">
                    <ol id="hot-box" class="exc"></ol>
                    <ol id="new-box" class="exc"></ol>
                    <div>
                        <ul class="flex nav subnav">
                            <li id="join_prize" class="flex-list"><a href="#active">活动</a></li>
                            <li class="flex-list"><a href="#notice">公告</a></li>
                        </ul>
                        <div class="subtab">
                            <ol id="active-box" class="active-box"></ol>
                            <ol id="notice-box" class="exc"></ol>
                            <div class="flex flex-v infoView"></div>
                        </div>
                    </div>
                    <div>
                        <ul class="flex nav subnav">
                            <li class="flex-list"><a href="#oldService">已开新服</a></li>
                            <li class="flex-list"><a href="#newService">新服预告</a></li>
                        </ul>
                        <div class="subtab">
                            <ol id="today-box" class="exc"></ol>
                            <ol id="server-box" class="exc"></ol>
                        </div>
                    </div>
                </div>
            </div>
            <div id="box-2" class="hide">
                <div class="flex user-info">
                    <div class="r50"><img class="headimg r50" src=""><em class="r50" onclick="sdk.logout()"><i
                                class="icon-refresh"></i></em></div>
                    <div class="flex flex-v flex-list">
                        <span class="nickname"></span>
                        <p><i class="icon-point"></i><span class="mypoint">0</span></p>
                    </div>
                    <a href="javascript:;" onclick="gc.signUp()" class="btn signtype">签到</a>
                </div>
                <div class="show-box show-tab">
                    <ol id="gift-box"></ol>
                </div>
            </div>
            <div id="box-3" class="hide">
                <div class="row head flex"></div>
                <div class="row">
                    <ol>
                        <li><a href="javascript:;" class="flex">
                                <div class="r50 c-point"><i class="icon-point"></i></div>
                                <span class="flex-list">我的积分</span><i class="number mypoint">0</i></a></li>
                        <li id="sign" onclick="gc.signUp()"><a href="javascript:;" class="flex">
                                <div class="r50 c-sign"><i class="icon-sign"></i></div>
                                <span class="flex-list">签到</span><i class="icon-right"></i></a></li>
                    </ol>
                </div>
                <div class="row">
                    <ol>
                        <li id="bindId"><a href="javascript:;" class="flex">
                                <div class="r50 c-user"><i class="icon-user"></i></div>
                                <span class="flex-list">实名认证</span><i id="isVerify" class="icon-right"></i></a></li>
                        <li id="bindPhone"><a href="#bind" class="flex">
                                <div class="r50 c-mobile"><i class="icon-mobile"></i></div>
                                <span class="flex-list">绑定手机</span><i id="isBind" class="icon-right"></i></a></li>
                    </ol>
                </div>
                <div class="row">
                    <ol>
                        <li><a href="#rules" class="flex">
                                <div class="r50 c-about"><i class="icon-about"></i></div>
                                <span class="flex-list">用户条例</span><i class="icon-right"></i></a></li>
                    </ol>
                </div>
                <div class="row">
                    <ol id="appBox"></ol>
                </div>
                <a href="javascript:;" id="lgout" class="btn subtn">退出</a>
            </div>
            <div id="box-4" class="hide"></div>
            <div id="box-5" class="bind hide">
                <div><img class="r50" src="//cdn.11h5.com/static/image/vutimes.png"></div>
                <div class="flex">
                    <i class="icon-name"></i>
                    <input class="flex-list" type="text" id="myName" placeholder="请输入您的真实姓名">
                </div>
                <div class="flex">
                    <i class="icon-id"></i>
                    <input class="flex-list" type="text" id="myId" placeholder="请输入您的身份证号">
                </div>
                <p>根据最新监管要求，进行游戏需要身份验证</p>
                <a href="javascript:;" id="myIdSubmit" class="btn subtn">提交认证</a>
            </div>
            <div id="box-6" class="bind hide"></div>
            <div id="box-7" class="row hide">
                <ol>
                    <li><a href="#guide" class="flex">
                            <div class="r50 c-about"><i class="icon-about"></i></div>
                            <span class="flex-list">用户指引</span><i class="icon-right"></i></a></li>
                    <li><a href="#agreement" class="flex">
                            <div class="r50 c-about"><i class="icon-about"></i></div>
                            <span class="flex-list">用户协议</span><i class="icon-right"></i></a></li>
                    <li><a href="#dispute" class="flex">
                            <div class="r50 c-about"><i class="icon-about"></i></div>
                            <span class="flex-list">纠纷处理方式</span><i class="icon-right"></i></a></li>
                </ol>
            </div>
            <div id="box-8" class="rules hide"></div>
            <div id="box-9" class="rules hide"></div>
            <div id="box-10" class="rules hide"></div>
            <div id="box-11" class="hide">
                <div class="flex user-info">
                    <div class="r50"><img class="headimg r50" src=""><em class="r50" onclick="sdk.logout()"><i
                                class="icon-refresh"></i></em></div>
                    <div class="flex flex-v flex-list">
                        <span class="nickname"></span>
                        <p><i class="icon-point"></i><span class="mypoint">0</span></p>
                    </div>
                    <a href="javascript:;" onclick="gc.signUp()" class="btn signtype">签到</a>
                </div>
                <ol class="flex nav mknav">
                    <li class="flex-list"><a class="flex flex-v" href="#market"><i
                                class="icon-shop"></i><span>积分商城</span></a></li>
                    <li class="flex-list"><a class="flex flex-v" href="#pointTask"><i
                                class="icon-task"></i><span>积分任务</span></a></li>
                    <li class="flex-list"><a class="flex flex-v" href="#pointGet"><i
                                class="icon-record"></i><span>积分记录</span></a></li>
                    <li class="flex-list"><a class="flex flex-v" href="#pointRule"><i
                                class="icon-rule"></i><span>积分规则</span></a></li>
                </ol>
                <div class="show-tab box">
                    <div class="box-1">
                        <div class="flex marquee">
                            <i class="icon-notice"></i>
                            <div>
                                <ol></ol>
                            </div>
                        </div>
                        <ol class="flex subMkNav subnav">
                            <li class="flex-list active"><a href="#market">虚拟物品</a></li>
                            <li class="flex-list"><a href="#pramarket">实物商品</a></li>
                        </ol>
                        <div class="subtab">
                            <div>
                                <div class="flex flex-wrap sort">
                                    <label>按首字母：</label>
                                    <ol class="flex">
                                        <li data-type="gift" class="active">全部</li>
                                        <li data-type="gift">ABC</li>
                                        <li data-type="gift">DEFG</li>
                                        <li data-type="gift">HIJKL</li>
                                        <li data-type="gift">MNOP</li>
                                        <li data-type="gift">QRST</li>
                                        <li data-type="gift">UVWX</li>
                                        <li data-type="gift">YZ</li>
                                    </ol>
                                </div>
                                <ol class="flex flex-x-between flex-wrap goods-item" id="goods-item"></ol>
                            </div>
                            <div>
                                <div class="flex flex-wrap sort">
                                    <label>按分类：</label>
                                    <ol class="flex">
                                        <li data-type="real" class="active">全部</li>
                                        <li data-type="real">可兑换</li>
                                    </ol>
                                </div>
                                <ol class="flex flex-x-between flex-wrap goods-item" id="real-item"></ol>
                            </div>
                        </div>
                    </div>
                    <div class="box-2">
                        <ol class="task"></ol>
                    </div>
                    <div class="box-3">
                        <ol class="flex nav record subnav">
                            <li class="flex-list"><a href="#pointGet">获取记录</a></li>
                            <li class="flex-list"><a href="#pointExchange">兑换记录</a></li>
                        </ol>
                        <div class="box subtab">
                            <ol class="exchange" id="point-get"></ol>
                            <ol class="exchange" id="point-change"></ol>
                        </div>
                    </div>
                    <div class="box-4">
                        <dl>
                            <dt>一、什么是积分？</dt>
                            <dd>
                                积分是为了感谢广大爱微游粉丝对爱微游的支持，根据用户体验游戏，游戏中心活跃度等情况推出的一项长期的回馈服务。积分作为爱微游积分商城的一种货币，可用于兑换积分商城里面的各种虚拟奖励，游戏礼包等。
                            </dd>
                            <dt>二、如何使用积分？</dt>
                            <dd>进入积分商城，找到自己喜欢的商品并点击，即可显示商品详情，当达到所需的兑换条件时，点击兑换按钮即可。</dd>
                            <dt>三、哪些地方可以使用积分？</dt>
                            <dd>
                                <dl>
                                    <dt>1、游戏特权</dt>
                                    <dd>限量游戏礼包，游戏道具随心兑换</dd>
                                    <dt>2、商城礼物 </dt>
                                    <dd>限时限量兑换虚拟商品</dd>
                                    <dt>3、积分抽奖</dt>
                                    <dd>使用积分进行抽奖，各种礼品等你来拿</dd>
                                </dl>
                            </dd>
                            <dt>四、积分如何获取？</dt>
                            <dd>
                                <dl>
                                    <dt>1、每日签到 </dt>
                                    <dd>进入游戏中心“个人”界面或者积分商城界面，点击签到，即可获得对应的积分奖励。</dd>
                                    <dt>2、游戏充值 </dt>
                                    <dd>在爱微游平台任意游戏内每充值1元即可获得10积分</dd>
                                    <dt>3、限时活动</dt>
                                    <dd>每隔一段时间都会开放积分获取的限时活动，小伙伴们别错过哦~</dd>
                                </dl>
                            </dd>
                            <dt>五、积分的有效期是多久？</dt>
                            <dd>积分永久有效</dd>
                        </dl>
                    </div>
                    <div class="box-5"></div>
                </div>
            </div>
        </div>
        <ol class="footer-nav flex flex-x-between">
            <li class="flex-list"><a href="#"><i class="icon-game"></i><span>游戏</span></a></li>
            <!--<li class="flex-list"><a href="#active"><i class="icon-info"></i><span>活动</span></a></li>-->
            <li class="flex-list" data-type="1"><a href="#gift"><i class="icon-gift"></i><span>礼包</span></a></li>
            <li class="flex-list"><a href="#market"><i class="icon-market"></i><span>积分商城</span></a></li>
            <li class="flex-list"><a href="javascript:;" id="jumpBBS"><i class="icon-community"></i><span>社区</span></a>
            </li>
            <li class="flex-list"><a href="#user"><i class="icon-user"></i><span>个人</span></a></li>
        </ol>
        <i class="icon-return" onclick="window.history.back()"></i>
    </div>
    <div class="flex flex-v leftBtn">
        <i></i>
        <i></i>
        <i></i>
    </div>
    <div class="flex flex-v topBtn">
        <i></i>
        <div class="flex">
            <i></i>
            <i></i>
        </div>
    </div>
    <div class="leftInfo"></div>
</div>
<script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script src="//mp.gtimg.cn/open/js/openApi.js"></script>
<script src="//cdn.11h5.com/static/js/zepto.min.js"></script>
<script src="//cdn.11h5.com/static/js/sdk.min.js"></script>
<script src="//cdn.11h5.com/static/js/sdk_host.min.js"></script>
<script src="//cdn.11h5.com/static/js/touchSlide.min.js"></script>
<script src="./js/core.min.js?ver=20180117002"></script>
<script src="./js/index.js?ver=20180117002"></script>
</body>
</html>
<?php
//$this->registerJsFile('./js/core.min.js?ver=20180117002');
//$this->registerJsFile('./js/index.js');
?>