
<?php
　$conn=mysql_connect("localhost","root","");
　//设定每一页显示的记录数
　$pagesize=1;
　mysql_select_db("mydata",$conn);
　//取得记录总数$rs，计算总页数用
　$rs=mysql_query("select count(*) from tb_product",$conn);
　$myrow = mysql_fetch_array($rs);
　$numrows=$myrow[0];
　//计算总页数

　$pages=intval($numrows/$pagesize);
　if ($numrows%$pagesize)
　　$pages++;
　//设置页数
　if (isset($_GET['page'])){
　　$page=intval($_GET['page']);
　}
　else{
　　//设置为第一页 
　　$page=1;
　}
　//计算记录偏移量
　$offset=$pagesize*($page - 1);
　//读取指定记录数
　$rs=mysql_query("select * from myTable order by id desc limit $offset,$pagesize",$conn);
　if ($myrow = mysql_fetch_array($rs))
　{
　　$i=0;
　　?＞
　　＜table border="0" width="80%"＞
　　＜tr＞
　　　＜td width="50%" bgcolor="#E0E0E0"＞
　　　　＜p align="center"＞标题＜/td＞
　　　　＜td width="50%" bgcolor="#E0E0E0"＞
　　　　＜p align="center"＞发布时间＜/td＞
　　＜/tr＞
　　＜?php
　　　do {
　　　　$i++;
　　　　?＞
　　＜tr＞
　　　＜td width="50%"＞＜?=$myrow["news_title"]?＞＜/td＞
　　　＜td width="50%"＞＜?=$myrow["news_cont"]?＞＜/td＞
　　＜/tr＞
　　　＜?php
　　　}
　　　while ($myrow = mysql_fetch_array($rs));
　　　　echo "＜/table＞";
　　}
　　echo "＜div align='center'＞共有".$pages."页(".$page."/".$pages.")";
　　for ($i=1;$i＜ $page;$i++)
　　　echo "＜a href='fenye.php?page=".$i."'＞[".$i ."]＜/a＞ ";
　　　echo "[".$page."]";
　　　for ($i=$page+1;$i＜=$pages;$i++)
　　　　echo "＜a href='fenye.php?page=".$i."'＞[".$i ."]＜/a＞ ";
　　　　echo "＜/div＞";
　　　?＞
　　＜/body＞
　　＜/html＞

　　五、总结

　　本例代码在windows2000 server+php4.4.0+mysql5.0.16上运行正常。该示例显示的分页格式是[1][2][3]…这样形式。假如想显示成“首页 上一页 下一页 尾页”这样形式，请加入以下代码：

$first=1;
$prev=$page-1;
$next=$page+1;
$last=$pages;

if ($page ＞ 1)
{
　echo "＜a href='fenye.php?page=".$first."'＞首页＜/a＞ ";
　echo "＜a href='fenye.php?page=".$prev."'＞上一页＜/a＞ ";
}

if ($page ＜ $pages)
{
　echo "＜a href='fenye.php?page=".$next."'＞下一页＜/a＞ 
　echo "＜a href='fenye.php?page=".$last."'＞尾页＜/a＞ ";
}