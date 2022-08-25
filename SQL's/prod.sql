create table produto(
    idProd int primary key AUTO_INCREMENT,
    nomeProd varchar(300) NOT NULL,
    precoProd int NOT NULL
);

INSERT INTO `produto` (`idProd`, `nomeProd`, `precoProd`) VALUES (NULL, 'Placa de Vídeo GTX', '290'), (NULL, 'Memória RAM', '150');