<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <link rel="stylesheet" href="/movie/Public/css/vote.css"/>
        <script src="/movie/Public/js/jquery-1.8.3.min.js"></script>
        <title>宙斯微电影--投票</title>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".list").click(function(){
                    $("#button").style.display="none";
                });
            });
        </script>
    </head>
    <body>
        <header id="header">
            <!--<h1>宙斯微电影</h1>-->
            <nav class="link">
                <!--<h2>网站导航</h2>-->
                <ul>
                    <li>
                        <a href="http://www.yjplchina.com/">云尖评论</a>
                    </li>
                    <li>
                        <a>犬呀头条</a>
                    </li>
                    <li>
                        <a href="http://www.bosswbw.com/">网报网</a>
                    </li>
                    <li>
                        <a>B财经</a>
                    </li>
                </ul>
            </nav>
            <div id="adver">
                <a>
                    <img  src="/movie/Public/images/zhousi.png" class="image">
                </a>
            </div>
            <div id="search">
                <form>
                    <input type="text" class="search" placeholder="请输入关键字">
                    <button class="button">搜索</button>
                </form>
            </div>
        </header>

        <div id="voterlist">
            <div>
                <ul style="list-style: none">
                    <?php if(is_array($vote)): foreach($vote as $key=>$vote): ?><li class="list" id="list">
                            <div style="max-width: 6.4rem;min-width: 3.2rem;">
                                <div style="float: left;text-align: left;">
                                    <a>
                                        <img src="/movie/Public/images/moneyperson.png" style="width: 50%;border-radius: 100px;">
                                    </a>
                                </div>
                                <div style="float:left;width: 40%;"><?php echo ($vote["user_detail"]); ?></div>
                                <div style="float: left;width: 40%;">
                                    <form action="add_vote" method="post">
                                        <input name="id" type="hidden" value="<?php echo ($vote["vote_id"]); ?>"/>
                                        <input name="order" type="hidden" value="<?php echo ($k); ?>"/>
                                        <button id="button" type="submit">投票</button>
                                    </form>
                                </div>

                            </div>
                        </li><?php endforeach; endif; ?>
                </ul>
            </div>

        </div>

        <footer id="footer">
            <div class="top">
                客户端 | 触屏版 | 电脑版
            </div>
            <div>成都宙斯影视文化传播有限公司</div>
            <div>CCTV央视微电影青春频道</div>
        </footer>
    </body>

</html>