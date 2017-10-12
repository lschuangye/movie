<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta  name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <link href="/movie/Public/css/vote.css" rel="stylesheet">
    <script src="/movie/Public/js/jquery-1.8.3.min.js"></script>

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
    </div>
    <div class="search">
        <form method="post" action="voteSearch">
            <input name="search" type="text" placeholder="请输入搜索关键字">
            <button class="searchBtn" type="submit">搜索</button>
        </form>
    </div>
    <script>
        $(function(){
            $(".searchBtn").click(function(){
//                    alert("submit");
            });
        });
    </script>
</header>

<div id="votelist">
    <?php if(is_array($vote)): foreach($vote as $k=>$vote): ?><div class="list">
            <div class="photo">
                <img src="/movie/Public/images/moneyperson.png" >
            </div>
            <div class="detail">
                <a><?php echo ($vote["user_name"]); ?></a><br>
                <p><?php echo ($vote["user_detail"]); ?></p><?php echo ($vote["vote_id"]); ?><br>
                <a style="background-color: red">IP=<?php echo ($vote["user_ip"]); ?></a>
            </div>
            <div class="votesum">
                <span><p>票数</p><br><a class="'votesum'.<?php echo ($k); ?>"><?php echo ($vote["vote_count"]); ?></a></span>
            </div>
            <div class="votebtn">
                <button id="btn" voteid="<?php echo ($vote["vote_id"]); ?>"  order="<?php echo ($k); ?>" vote_ip="<?php echo ($vote["user_ip"]); ?>" vote_sum="<?php echo ($vote["vote_count"]); ?>" type="submit" class="button">投票</button>
                <!--<button id='"btn".<?php echo ($k); ?>'>投票</button>-->
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
                console.log(id+order);//return;
//                    var url="<?php echo U('Index/responsive','','');?>";
//                    '/movie/Home/Index/IndexController.php'
                $.post('/movie/Home/Index/data',{id:id,order:order,ip:ip},function(data){
                    //
                    if(data.status==1){
                        alert("对不起，您已为此项投票！");
                    }else {
                        alert("投票成功！");
//                            var sum=data.vote_count+1;
//                            $(".votesum").nextElementSibling.innerText(sum);
////                            alert(data.vote_count);
                    }
                });
            });

        });
    </script>
</div>
</body>
</html>