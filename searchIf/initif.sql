use zdxbmsg;
create table ifmsg (
    `ISSN刊号` varchar(50) not null,
    `刊名简写` varchar(50) not null,
    `刊名全称` varchar(150) not null,
    `最新影响因子` varchar(50) not null,
    `中科院大类分区` varchar(50) not null,
    primary key (`刊名简写`)
) engine=innodb default charset=utf8;