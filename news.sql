CREATE TABLE loaitin(
	idLoaiTin int primary key,
	tenLoaiTin varchar(50)
);

CREATE TABLE tintuc(
	idTin int primary key,
	tenTin varchar(50),
	moTa varchar(200),
	urLinks varchar (200),
	urlImgages varchar (200),
	idLoaiTin int,
	FOREIGN KEY (idLoaiTin)
	REFERENCES loaitin (idloaiTin)
);

INSERT INTO loaitin(idLoaiTin, tenLoaiTin)
VALUES(1,'Tin tức'),
		(2,'Sự kiện'),
		(3,'Thông báo');


INSERT INTO tintuc(idTin, tenTin, moTa, urLinks, urlImgages, idLoaiTin)
VALUES(1,'TT01','Những đổi mới của bundle','news_url/bundle.php','../images/news/news/bundle.jpg','1'),
	(2,'TT02','Giới thiệu cây chùy','news_url/theMace.php','../images/news/news/theMace.jpg','1'),
	(3,'SK01','Sự kiện Halloween','news_url/halloween.php','../images/news/event/minecraft-halloween.jpg','2'),
	(4,'SK02','Sự kiện giáng sinh','news_url/noel.php','../images/news/event/minecraft-noel.jpg','2'),
	(5,'TB01','Cập nhật phiên bản 1.21','news_url/update1.21.php','../images/news/notification/update1.21.jpg','3'),
	(6,'TB02','Cập nhật phiên bản 1.21.2','news_url/update1.21.2.php','../images/news/notification/update1.21.2.jpg','3');

