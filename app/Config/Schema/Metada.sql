
  CREATE TABLE modulos (
    id int(11) NOT NULL AUTO_INCREMENT,
    nome varchar(25)  DEFAULT NULL,
    descricao varchar(25)  DEFAULT NULL,
    estabelecimento_id int(11) DEFAULT NULL,
    PRIMARY KEY (id)
   CONSTRAINT `id_estabelecimento` FOREIGN KEY (`modulo_id`) REFERENCES `modulos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
 CREATE TABLE estabelecimentos (
    id int(11) NOT NULL AUTO_INCREMENT,
    brasao varchar(20) DEFAULT NULL,
    codigo int(11) DEFAULT NULL,
    cnpj varchar(14) DEFAULT NULL,
    nome_fantasia varchar(180) DEFAULT NULL,
    cep varchar(15) DEFAULT NULL,
    endereco varchar(180) DEFAULT NULL,
    numero int(5) DEFAULT NULL,
    complemento varchar(50) DEFAULT NULL,
    bairro varchar(50) DEFAULT NULL,
    cidade varchar(20) DEFAULT NULL,
    responsavel varchar(20) DEFAULT NULL,
    telefone varchar(30) DEFAULT NULL,
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE usuarios (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_nascimento` date,
  `login` varchar(100) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `funcao` varchar(100) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `blocked` datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `usuarios`(`id`,`data_nascimento`,  `login`, `senha`, `nome`, `funcao`, `cpf`, `email`, `created`, `modified`,  `blocked`)
 VALUES (1,NULL,'victor','97e485556b8ab3d630816b5f3b02964102f57744060c969dea9e245255fa120d','victor','suporte',45454,'v@gmail.com',null,null,null);
 INSERT INTO `thiago`(`id`,`data_nascimento`,  `login`, `senha`, `nome`, `funcao`, `cpf`, `email`, `created`, `modified`,  `blocked`)
 VALUES (2,NULL,'teste','97e485556b8ab3d630816b5f3b02964102f57744060c969dea9e245255fa120d','victor','suporte',45454,'v@gmail.com',null,null,null);
 INSERT INTO `usuarios`(`id`,`data_nascimento`,  `login`, `senha`, `nome`, `funcao`, `cpf`, `email`, `created`, `modified`,  `blocked`)
 VALUES (3,NULL,'marcus','97e485556b8ab3d630816b5f3b02964102f57744060c969dea9e245255fa120d','victor','suporte',45454,'v@gmail.com',null,null,null);

CREATE TABLE estabelecimentos_modulos (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estabelecimento_id` int(11) DEFAULT NULl,
  `modulo_id` int(11) DEFAULT NULl,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
