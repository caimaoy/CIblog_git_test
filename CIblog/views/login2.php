<div id="BodyBg"  class = "stretch">
    <img src="img/cricket@2x.jpg" class="stretch" alt="" />
    <div class="navbar navbar-fixed-top">
        <div  class ="navbar-inner">
            <div class = "container" >
                <a class="brand" href="./index.html">Caimaoy's Blog</a>
                <!--
                            <ul class="nav">
                <li class="active">
                    <a href="#">首页</a>
                </li>
                <li>
                    <a href="#">链接</a>
                </li>
                <li>
                    <a href="#">链接</a>
                </li>
            </ul>
            -->
        </div>

    </div>
</div>

<div class = "container-fluid">
    <div class="front-card" >
        <div class = "front-welcome" >
            <div class = "front-welcome-text">
                <h1>欢迎来到Caimaoy's Blog</h1>
                <p>与你观星的人们一起，知天易逆天难</p>
            </div>
        </div>

        <div class = "front-signin">
            <form action="/ciblog/index.php/login/checklogin" method="post" class = "signin">
                <div class="placeholding-input username">
                    <input type="text" id="signin-email" class="text-input email-input" name="username" title="用户名或电子邮件地址" autocomplete="on" tabindex="1">
                    <label for="signin-email" class="placeholder">用户名或电子邮件地址</label>
                </div>
                <table class="flex-table password-signin">
                    <tbody>
                        <tr>
                            <td class="flex-table-primary">
                                <div class="placeholding-input password flex-table-form">
                                    <input type="password" id="signin-password" class="text-input flex-table-input" name="password" title="密码" tabindex="2">
                                    <label for="signin-password" class="placeholder">密码</label>
                                </div>
                            </td>
                            <td class="flex-table-secondary">
                                <button type="submit" class="btn-info btn  submit flex-table-btn js-submit" tabindex="4">登录</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="remember-forgot">
                    <label class="remember">
                        <input type="checkbox" value="1" name="remember_me" tabindex="3">
                        <span>记住我</span>
                    </label>
                    <span class="separator">·</span>
                    <a class="forgot" href="/account/resend_password">忘记密码?</a>
                </div>
            </div>
            <div class="front-signup js-front-signup">
                <h2> <strong>新来 Caimaoy's Blog?</strong>
                    注册一发
                </h2>
                <form action="https://twitter.com/signup" class="signup" method="post">
                    <div class="placeholding-input">
                        <input type="text" id="signup-user-name" class="text-input" autocomplete="off" name="user[name]" maxlength="20">
                        <label for="signup-user-name" class="placeholder">全名</label>
                    </div>
                    <div class="placeholding-input">
                        <input type="text" id="signup-user-email" class="text-input email-input" autocomplete="off" name="user[email]">
                        <label for="signup-user-email" class="placeholder">电子邮件地址</label>
                    </div>
                    <div class="placeholding-input">
                        <input type="password" id="signup-user-password" class="text-input" name="user[user_password]">
                        <label for="signup-user-password" class="placeholder">密码</label>
                    </div>

                    <input type="hidden" value="" name="context">
                    <input type="hidden" value="5dce6740453ff261c695e7ff4dda85355bccbba5" name="authenticity_token">
                    <button type="submit" class="btn signup-btn">注册 Caimaoy's Blog</button>
                </form>
            </div>
        </div>
    </div>

</div>



</body>