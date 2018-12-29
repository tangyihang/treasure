<div class="archives" style="height:465px;background:#2E3740;">
  <div class="archives_con">
    <div class="archives_img"><img src="/Public/Images/Home/help_t.png" width="100" height="100" alt=""/></div>
    <h2 class="white">个人档案</h2>
    <p class="white">昵称：{{$rowUser['member_nickname']}}</p>
    <p class="white">级别：
      <eq name="rowUser.member_type" value="10"> 
      	普通用户
      	 <if condition="$type eq 4">
         	<a href="/Dynamic/Apply/type/4" style="font-size:12px;color:#20AEFF;">申请经理</a>
         <elseif condition="$type eq 3" />
         	<a href="/Dynamic/Apply/type/3" style="font-size:12px;color:#20AEFF;">申请主管</a>
         <elseif condition="$type eq 2"/>
         	<a href="/Dynamic/Apply/type/2" style="font-size:12px;color:#20AEFF;">申请辅主管</a>
         </if>  
      </eq>
      <eq name="rowUser.member_type" value="20"> 副主管
      	 <if condition="$type eq 4">
         	<a href="/Dynamic/Apply/type/4" style="font-size:12px;color:#20AEFF;">申请经理</a>
         <elseif condition="$type eq 3" />
         	<a href="/Dynamic/Apply/type/3" style="font-size:12px;color:#20AEFF;">申请主管</a>
      	</if>
       </eq>
      <eq name="rowUser.member_type" value="30"> 主管 
      	 <if condition="$type eq 4">
         	<a href="/Dynamic/Apply/type/4" style="font-size:12px;color:#20AEFF;">申请经理</a>
         </if>
      
      </eq>
      <eq name="rowUser.member_type" value="40"> 经理 </eq>
    </p>
    <p class="white">手机号码：{{$rowUser['member_phone']}}</p>
    <p class="white">状态：已激活</p>
    <p class="white">静态奖钱包：{{$rowUser['member_money_static']}}</p>
    <p class="white">管理奖钱包：{{$rowUser['member_money_manage']}}</p>
    <p class="white">直推奖钱包：{{$rowUser['member_money_direct']}}</p>
    <p class="pbtn"><a href="/Member/edit" class="btn_gr">个人资料</a><a href="/Member/pwd" class="btn_mm">修改密码</a></p>
  </div>
</div>
