<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta  name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <link href="/movie/Public/css/vote.css" rel="stylesheet">
        <script src="/movie/Public/js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript">
            function vote(){
                var x=document.getElementById("votesum1").innerHTML;
                x=parseInt(x)+1;
                document.getElementById("votesum1").innerHTML=x;
            }
        </script>
    </head>
    <body>
    <header id="header">
            <div class="logo">
                <img src="/movie/Public/images/zhousi.png" >
            </div>
            <div>
                <nav class="link">
                    <!--<h2>网站导航</h2>-->
                    <ul>
                        <li>
                            <a href="http://www.yjplchina.com/">
                                云尖评论
                                <!--<img src="/movie/Public/images/bfe.jpg" style="width: 100%;height: 50px">-->
                            </a>
                        </li>
                        <li>
                            <a href="http://www.qyttchina.com/">犬呀头条</a>
                        </li>
                        <li>
                            <a href="http://www.bosswbw.com/">网报网</a>
                        </li>
                        <li>
                            <a href="http://www.bfechina.com/">B财经</a>
                        </li>
                    </ul>
                </nav>
            </div>
        <div class="search">
            <form method="post" action="voteSearch">
                <input name="search" type="text" placeholder="请输入搜索关键字">
                <button class="searchBtn" type="submit">搜索</button>
            </form>
        </div>
    </header>

    <div id="votelist">
        <?php if(is_array($vote)): foreach($vote as $k=>$vote): ?><div class="list">
                <div class="photo">
                    <img src="/movie/Public/images/moneyperson.png" >
                </div>
                <div class="detail">
                    <a><?php echo ($vote["user_name"]); ?></a>
                    <a style="font-size: 14px;color: #fda7b2">(编号：<?php echo ($vote["vote_id"]); ?>)</a>
                    <p><?php echo ($vote["user_detail"]); ?></p>
                    <?php echo ($vote["vote_id"]); ?><br>
                    <!--<p style="background-color: red">IP=<?php echo ($vote["user_ip"]); ?></p>-->
                </div>

                <div class="votebtn">
                    <span><p>票数</p><a id="votesum<?php echo ($k+1); ?>"><?php echo ($vote["vote_count"]); ?></a></span>
                    <button id="btn" voteid="<?php echo ($vote["vote_id"]); ?>"  order="<?php echo ($k+1); ?>" vote_ip="<?php echo ($vote["user_ip"]); ?>" vote_sum="<?php echo ($vote["vote_count"]); ?>" type="submit" class="button">投票</button>
                </div>
            </div><?php endforeach; endif; ?>
        <script>
            $(function(){
                $(".button").click(function(){
//                    alert("asd");
                    var id=$(this).attr("voteid");
                    var order=$(this).attr("order");
                    var ip=$(this).attr("vote_ip");
                    var count=$(this).attr("vote_sum");
                    var str="votesum"+order;
                    var val=document.getElementById(str).innerHTML;
                    var test="test";
                    val=parseInt(val)+1;
//                    console.log(id+order);//return;
                    $.post('/movie/Home/Index/data',{id:id,order:order,ip:ip},function(data){
                        //
                        if(data.status==1){
                            alert("对不起，您已为此项投票！");
                        }else {
                            alert("投票成功！");
                            document.getElementById(str).innerHTML=val;
                        }
                    });
                });

            });
        </script>
    </div>
    <footer>
        没有内容了没有内容了
        没有内容了
        没有内容了
        没有内容了
    </footer>
    </body>
</html>