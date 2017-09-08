$(document).ready(function(){
    $('.remove').click(function(){
        var id = $(this).prev().val();
        var obj = $(this);
        $.ajax({
            type:'post',
            url:'/order/del',
            dataType:'json',
            data:{
                id:id
            },
            success:function(msg)
            {
                if(msg.code == 200)
                {
                    alert(msg.msg);
                    obj.parent().parent().parent().parent().remove();
                }else{
                    alert(msg.msg);
                }
            }
        })
    })
    $('#search').click(function(){
        var mix_kw = $(':input[name=mix_kw]').val();
        var obj = $(".clear_search");
        var str = '';
        $.ajax({
            type:'post',
            url:'/order/search',
            dataType:'json',
            data:{
                mix_kw:mix_kw
            },
            success:function(msg)
            {
                if(msg.code == 200)
                {
                    for(var i = 0; i<=msg.data.length; i++){
                    str += "<table class=\"table table-bordered m-t\">\n" +
                        "            <thead>\n" +
                        "            <tr>\n" +
                        "                <th><input type=\"checkbox\">&nbsp&nbsp"+msg.data[i].crete_time+"</th>\n" +
                        "                <th colspan=\"1\">订单号："+msg.data[i].odd_numbers+"</th>\n" +
                        "                <th colspan=\"3\"></th>\n" +
                        "                <th colspan=\"2\">\n" +
                        "                    <input type=\"hidden\" name=\"id\" value=\'\"+msg.data[i].id+\"\'>\n" +
                        "                    <a class=\"m-l remove\" href=\"<?= UrlService::BuildNullUrl(); ?>\" data=\"1\">\n" +
                        "                        <i class=\"fa fa-trash fa-lg\" style=\"margin-left: 170px\"></i>\n" +
                        "                    </a>\n" +
                        "\n" +
                        "                </th>\n" +
                        "            </tr>\n" +
                        "            </thead>\n" +
                        "            <tbody>\n" +
                        "                <tr>\n" +
                        "                    <td width=\"120px\">This is a 图片</td>\n" +
                        "                    <td style=\"vertical-align:middle;height:100%\">中式汉堡包1份 豆沙面包2分 奶油面包1份 千层糕1份</td>\n" +
                        "                    <td width=\"200px\" align=\"center\" style=\"vertical-align:middle;height:100%\">"+msg.data[i].postscript+"</td>\n" +
                        "                    <td width=\"140px\" align=\"center\" style=\"vertical-align:middle;height:100%\">总价:￥"+msg.data[i].order_amount+"</td>\n" +
                        "                    <td width=\"160px\" align=\"center\" style=\"vertical-align:middle;height:100%\">下单时间:"+msg.data[i].crete_time+"</td>\n" +
                        "                    <td width=\"130px\" align=\"center\" style=\"vertical-align:middle;height:100%\">\n" ;
                                             if(msg.data[i].type == 0){
                        str += "正常订单\n";
                                             }else if(msg.data[i].type == 1)
                                             {
                        str += "活动订单\n";
                                             }else if(msg.data[i].type == 2)
                                             {
                        str += "促销订单\n";
                                             }else if(msg.data[i].type == 3)
                                             {
                        str += "订单关闭\n";
                                             }
                    str += "                            <br>\n" +
                        "                    </td>\n" +
                        "                    <td width=\"100px\" align=\"center\"  style=\"vertical-align:middle;height:100%\"><a href=\"\">再来一单</a></td>\n" +
                        "                </tr>\n" +
                        "            </tbody>\n" +
                        "        </table>";

                    obj.html(str);
                    }
                }else{
                    alert(msg.msg);
                }
            }
        })
    })

})