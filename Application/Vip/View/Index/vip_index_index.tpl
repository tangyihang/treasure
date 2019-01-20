<body>

<div class="mui-content">

    <div class="mui-row"
         style="background:#fff url(/Public/Images/Home/userbg.jpg) no-repeat center top;background-size:100% 8rem; padding-top:8rem;">

        <!--
             顶部开始
        -->
        <div class="mui-col-sm-12 mui-col-xs-12 mui-text-center" style=" margin-top:-3.2rem">

            <div class="mui-row">
                <div class="mui-col-sm-12 mui-col-xs-12" style="text-align:center;">
                    <img src="{{$output.member.headimgurl}}?imageView2/1/w/80/h/80"
                         style="width: 6rem;border-radius:50%;"/>
                </div>
                <div class="mui-col-sm-12 mui-col-xs-12 mui-text-center" style="margin-top:0.2rem;">
                    <p style="color:#333;font-weight:800; font-size:16px;">{{$output.member.nickname}}</p>
                </div>
            </div>
            <div class="mui-row" style="width:100%; margin:0.3rem auto 0.8rem;">
                <div class="mui-col-sm-4 mui-col-xs-4  mui-text-center">
                    <p style="font-size:13.5px;color:#666; text-align:right; padding-right:15px;">
                        积分：{{$output.points}}</p>
                </div>
                <div class="mui-col-sm-4 mui-col-xs-4 mui-text-center">
                    <p style="font-size:13.5px;color:#666; text-align:left; padding-left:15px;">
                        累计获胜：{{$output.count}}</p>
                </div>
                <div class="mui-col-sm-4 mui-col-xs-4 mui-text-center">
                    <p style="font-size:13.5px;color:#666; text-align:left; padding-left:15px;">
                        今剩提现次数：{{$output.withdraw_num}}</p>
                </div>
            </div>
            <div class="mui-row" style="width:50%; margin:1.1rem auto;">
                <div class="mui-col-sm-6 mui-col-xs-6  mui-text-center"><a href="/vip/points/index"
                                                                           style="width:80%; display:block; float:left; height:2rem; line-height:2rem; font-size:13px; color:#fff; text-align:center; opacity:0.6; background:#6ad8d5; border-radius:0.4rem;">充值</a>
                </div>
                <div class="mui-col-sm-6 mui-col-xs-6 mui-text-center"><a href="/vip/points/get"
                                                                          style="width:80%; display:block; float:right;height:2rem; line-height:2rem; font-size:13px; color:#fff; text-align:center; opacity:0.6; background:#fc5d3d; border-radius:0.4rem;">提现</a>
                </div>
            </div>
        </div>

    </div>
    <div class="mui_row" style="background:#f5f5f5; height:2.2rem; ">
        <div class="li">今日参与：{{$output.todaySum}}单</div>
        <div class="li">今日获胜：{{$output.todayWin}}单</div>
        <div class="li">今日失败：{{$output.todayLose}}单</div>
    </div>


    <style>
        .li

        {width:33%;float:left;text-align:center;font-size:0.75rem; color:#333; opacity:0.8; line-height:2.2rem;}
    </style>


    <div class="mui-row" style=" padding-bottom:60px;">
        <!--
               描述：功能列表
        -->
        <div class="mui-col-sm-3 mui-col-xs-4"
             style="background:#FFF;border-bottom:1px solid #E9E9E9; border-right:1px #eeeeee solid;">
            <a href="/order/orderList?phone={{$output.member.phone}}">
                <div style="  padding:0.6rem;width:3rem;height:3rem;margin:0.8rem auto 0.1rem; display:block;"><img
                            class="mui-media-object" src="/Public/Images/Home/db1.png"
                            style="width:1.8rem;height:1.8rem;"></div>
                <div style="line-height:2rem; padding-bottom:0.8rem;color:#8F8F94; display:block; text-align:center;">
                    抢购记录
                </div>
            </a>
        </div>

        <div class="mui-col-sm-3 mui-col-xs-4"
             style="background:#FFF;border-bottom:1px solid #E9E9E9; border-right:1px #eeeeee solid;">
            <a href="/vip/Snatch/login">
                <div style=" padding:0.6rem;width:3rem;height:3rem;margin:0.8rem auto 0.1rem; display:block;"><img
                            class="mui-media-object" src="/Public/Images/Home/db2.png"
                            style="width:1.8rem;height:1.8rem;"></div>
                <div style="line-height:2rem; padding-bottom:0.8rem;color:#8F8F94; display:block; text-align:center;">
                    兑换记录
                </div>
            </a>
        </div>

        <div class="mui-col-sm-3 mui-col-xs-4"
             style="background:#FFF;border-bottom:1px solid #E9E9E9; border-right:1px #eeeeee solid;">
            <a href="/rank/day">
                <div style="padding:0.6rem;width:3rem;height:3rem;margin:0.8rem auto 0.1rem; display:block;"><img
                            class="mui-media-object" src="/Public/Images/Home/db3.png"
                            style="width:1.8rem;height:1.8rem;"></div>
                <div style="line-height:2rem; padding-bottom:0.8rem;color:#8F8F94; display:block; text-align:center;">
                    总排行榜
                </div>
            </a>
        </div>

        <div class="mui-col-sm-3 mui-col-xs-4"
             style="background:#FFF;border-bottom:1px solid #E9E9E9; border-right:1px #eeeeee solid;">
            <a href="/Vip/Tui/index?phone={{$output.member.phone}}">
                <div style=" padding:0.6rem;width:3rem;height:3rem;margin:0.8rem auto 0.1rem; display:block;"><img
                            class="mui-media-object" src="/Public/Images/Home/db4.png"
                            style="width:1.8rem;height:1.8rem;"></div>
                <div style="line-height:2rem; padding-bottom:0.8rem;color:#8F8F94; display:block; text-align:center;">
                    推广展示
                </div>
            </a>
        </div>

        <eq name="output.tui_type" value="1">
            <div class="mui-col-sm-3 mui-col-xs-4"
                 style="background:#FFF;border-bottom:1px solid #E9E9E9; border-right:1px #eeeeee solid;">
                <a href="/Vip/Tui/tui_advance?phone={{$output.member.phone}}">
                    <div style=" padding:0.6rem;width:3rem;height:3rem;margin:0.8rem auto 0.1rem; display:block;"><img
                                class="mui-media-object" src="/Public/Images/Home/db5.png"
                                style="width:1.8rem;height:1.8rem;"></div>
                    <div style="line-height:2rem; padding-bottom:0.8rem;color:#8F8F94; display:block; text-align:center;">
                        高级代理
                    </div>
                </a>
            </div>
        </eq>

        <div class="mui-col-sm-3 mui-col-xs-4"
             style="background:#FFF;border-bottom:1px solid #E9E9E9; border-right:1px #eeeeee solid;">
            <a href="/Vip/Tui/invite">
                <div style=" padding:0.6rem;width:3rem;height:3rem;margin:0.8rem auto 0.1rem; display:block;"><img
                            class="mui-media-object" src="/Public/Images/Home/db10.png"
                            style="width:1.8rem;height:1.8rem;"></div>
                <div style="line-height:2rem; padding-bottom:0.8rem;color:#8F8F94; display:block; text-align:center;">
                    邀请码
                </div>
            </a>
        </div>

        <div class="mui-col-sm-3 mui-col-xs-4"
             style="background:#FFF;border-bottom:1px solid #E9E9E9; border-right:1px #eeeeee solid;">
            <a href="/set/rule">
                <div style="padding:0.6rem;width:3rem;height:3rem;margin:0.8rem auto 0.1rem; display:block;"><img
                            class="mui-media-object" src="/Public/Images/Home/db6.png"
                            style="width:1.8rem;height:1.8rem;"></div>
                <div style="line-height:2rem; padding-bottom:0.8rem;color:#8F8F94; display:block; text-align:center;">
                    玩法介绍
                </div>
            </a>
        </div>
        <div class="mui-col-sm-3 mui-col-xs-4"
             style="background:#FFF;border-bottom:1px solid #E9E9E9; border-right:1px #eeeeee solid;">
            <a href="/vip/user/bank">
                <div style="padding:0.6rem;width:3rem;height:3rem;margin:0.8rem auto 0.1rem; display:block;"><img
                            class="mui-media-object" src="/Public/Images/Home/db7.png"
                            style="width:1.8rem;height:1.8rem;"></div>
                <div style="line-height:2rem; padding-bottom:0.8rem;color:#8F8F94; display:block; text-align:center;">
                    银行卡管理
                </div>
            </a>
        </div>
        <div class="mui-col-sm-3 mui-col-xs-4"
             style="background:#FFF;border-bottom:1px solid #E9E9E9; border-right:1px #eeeeee solid;">
            <a href="/vip/index/logout">
                <div style="padding:0.6rem;width:3rem;height:3rem;margin:0.8rem auto 0.1rem; display:block;"><img
                            class="mui-media-object" src="/Public/Images/Home/db9.png"
                            style="width:1.8rem;height:1.8rem;"></div>
                <div style="line-height:2rem; padding-bottom:0.8rem;color:#8F8F94; display:block; text-align:center;">
                    退出登陆
                </div>
            </a>
        </div>
        <!--
                描述：功能列表
         -->


    </div>


</div>


</body>
