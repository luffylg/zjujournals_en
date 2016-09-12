#drop database if exists zdxbmsg;
#重新建立一个zdxbmsg数据库
#create database zdxbmsg;
#把zdxbmsg切换为当前用数据库
use zdxbmsg;
#grant select, insert, update, delete on zdxbmsg.* to 'zdxb'@'127.0.0.1' identified by 'zdxb';
#创建表artmsg
create table artmsg (
    `title` varchar(150) not null,
    `status` varchar(50) not null,
    `statusTime` varchar(50) not null,
    `zid` varchar(50) not null,
    `lid` varchar(50) not null,
    `firstDecision` varchar(50) not null,
    `firstDay` varchar(50) not null,
    `finalDecision` varchar(50) not null,
    `finalDay` varchar(50) not null,
    `Day1` varchar(50) not null,
    `Day2` varchar(50) not null,
    `Day3` varchar(50) not null,
    primary key (`zid`)
) engine=innodb default charset=utf8;