<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <!--<link rel="stylesheet" href="/movie/Public/css/vote.css"/>-->
    <script src="/movie/Public/js/jquery-1.8.3.min.js" ></script>
    <title>投票</title>
    <style type="text/css">
        .image{
            width:30%;
            border-radius:60%;
        }
        #graph
        {
            width:600px;
            height:25px;
            border:1px solid green;
        }
        #support
        {
            float:left;
            height:25px;
            background-color:blue;
        }

        #object
        {
            float:right;
            height:25px;
            background-color:gray;
        }
        table
        {
            margin:0 auto;
        }
        span
        {
            color:red;
            font-size:16px;
            font-weight:bold;
        }
        button
        {
            cursor:pointer;
        }
    </style>

    <script type="text/javascript">
        window.onload = function()
        {
            support_graph = document.getElementById('support');
            object_graph = document.getElementById('object');
            support_graph.style.width = '0px';
            object_graph.style.width = '0px';
        }
        function vote(ele,status)
        {
            var span = document.getElementsByTagName('span');
            var support_votes = parseInt(span[0].innerHTML);
            var object_votes = parseInt(span[1].innerHTML);
            if (100 == support_votes + object_votes)
            {
                alert('投票已结束!谢谢!');
                location.reload();
            }
            else
            {
                if (status)
                {
                    span[0].innerHTML = support_votes + 1;
//                    var s_graph_width = parseInt(support_graph.style.width) + 6;
//                    support_graph.style.width = s_graph_width + 'px';
                }
                else
                {
                    span[1].innerHTML = object_votes + 1;
//                    var o_graph_width = parseInt(object_graph.style.width) + 6;
//                    object_graph.style.width = o_graph_width + 'px';
                }
            }
        }

    </script>
</head>
<body>
<div style="width: 100%;height: 30%;position: fixed;top: 0;left: 0;z-index: 100;">
    <div style="width: 100%;text-align: center">
        <h1>投票活动？</h1>
        <h3>活动时间：</h3>
        <h4>2016年8月1日-2016年10月1日</h4>
    </div>
    <div style="width: 100%;text-align: center;font-size: larger">
        <input name="serch" style="width: 70%;height: 10%;vertical-align: middle;font-size: 30px"/><button style="font-size: 30px;vertical-align: middle">搜索</button>
    </div>
</div>
<div id="vote" class="vote" style="margin-top: 10px;position:absolute;top: 300px;height: 70%;;overflow: scroll;width: 100%;text-align: center;">
    <div class="voter">
        <ul style="width: 100%;list-style: none">
            <?php if(is_array($vote)): foreach($vote as $k=>$vote): ?><li style="width: 100%;font-size: 24px">
                    <table style="width: 100%;height: 30%;">
                        <tr>
                            <td style="width: 27%;">
                                <a>
                                    <img src="/movie/Public/images/moneyperson.png" style="width: 100%;height: auto" class="image">
                                </a>
                            </td>
                            <td style="width:35%;text-align: left">
                                <a><?php echo ($vote["user_name"]); ?></a><br>
                                <p style="font-size: 24px"><?php echo ($vote["user_detail"]); ?>医学专家，为人民服务30年！</p>
                            </td>
                            <td style="width:20%;text-align: left">
                                <table>
                                    <tr>
                                    <tr>
                                        <td style="text-align: center"><span style="font-size: 30px"><?php echo ($vote["vote_count"]); ?></span>票</td>
                                    </tr>
                                    <tr>
                                        <td id="current" style="text-align: center">
                                            当前排名：<?php echo ($k+1); ?>
                                        </td>
                                    </tr>
                                    </tr>

                                </table>
                            </td>
                            <td style="width: 15%;margin-right: 20px;">
                                <form action="add_vote" method="post">
                                    <input name="id" type="hidden" value="<?php echo ($vote["vote_id"]); ?>"/>
                                    <input name="order" type="hidden" value="<?php echo ($k); ?>"/>
                                    <button id="addvote" type="submit" class="button">投票</button>
                                </form>
                            </td>
                            <td style="width: 5%"></td>
                        </tr>
                    </table>
                </li><?php endforeach; endif; ?>
        </ul>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#addvote").click(function(){
            $("#vote").load("vote.html");
        }) ;
    });
</script>
<!--<table>-->

<!--<tr>-->

<!--<td><button-->
<!--onclick="vote(this,true)">赞成<span>0</span>票</button></td>-->

<!--<td><div id="graph">-->
<!--<div id="support"></div>-->
<!--<div id="object"></div>-->
<!--</div>-->
<!--</td>-->

<!--<td><button-->
<!--onclick="vote(this,false)">反对<span>0</span>票</button></td>-->

<!--</tr>-->
<!--</table>-->

</body>
</html>