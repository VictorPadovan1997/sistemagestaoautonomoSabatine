
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
    PRIMARY KEY (id),
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

  CREATE TABLE modulos (
    id int(11) NOT NULL AUTO_INCREMENT,
    nome varchar(25)  DEFAULT NULL,
    descricao varchar(25)  DEFAULT NULL,
    estabelecimento_id int(11) DEFAULT NULL,
    PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

  CREATE TABLE assinantes  (
    id int(11) NOT NULL AUTO_INCREMENT,
    'identificador' int(20) DEFAULT NULL,
    login varchar(25)  DEFAULT NULL,
    senha varchar(200)  DEFAULT NULL,
    email varchar(200) DEFAULT NULL,
    nome varchar(25)  DEFAULT NULL,
    cpf varchar(25) DEFAULT NULL,
    estabelecimento_id int(11) DEFAULT NULL,
    PRIMARY KEY (id),
   CONSTRAINT `id_estabelecimento_assinantes` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

  CREATE TABLE estabelecimentos_modulos (
    id int(11) NOT NULL AUTO_INCREMENT,
    estabelecimento_id int(11)  DEFAULT NULL,
    modulo_id int(11)  DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `id_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `id_modulos` FOREIGN KEY (`modulo_id`) REFERENCES `modulos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

 CREATE TABLE categorias (
    id int(11) NOT NULL AUTO_INCREMENT,
    nome varchar(25)  DEFAULT NULL,
    estabelecimento_id int(11) DEFAULT NULL,
    `blocked` datetime DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `estabelecimento_id_categorias` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

 CREATE TABLE produtos (
    id int(11) NOT NULL AUTO_INCREMENT,
    nome varchar(25)  DEFAULT NULL,
    quantidade_inicial int(250)  DEFAULT NULL,
    preco_custo decimal(10,2) DEFAULT NULL,
    utiliza_materia_prima varchar(25)  DEFAULT NULL,
    preco_venda decimal(10,2) DEFAULT NULL,
    categoria_id int(11)  DEFAULT NULL,
    descricao text DEFAULT NULL,
    estabelecimento_id int(11) DEFAULT NULL,
    `blocked` datetime DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `estabelecimento_id_produtos` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `categoria_id_fk` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

 CREATE TABLE materias (
    id int(11) NOT NULL AUTO_INCREMENT,
    nome varchar(25)  DEFAULT NULL,
    estabelecimento_id int(11) DEFAULT NULL,
    quantidade int(11) DEFAULT NULL,
    valor decimal(10,2) DEFAULT NULL,
    produto_id int(11) DEFAULT NULL,
    `blocked` datetime DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `estabelecimento_id_materia_primas` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `produto_id_fk_materia` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


  CREATE TABLE materias_produtos  (
    id int(11) NOT NULL AUTO_INCREMENT,
    produto_id int(11)  DEFAULT NULL,
    materia_id int(11)  DEFAULT NULL,
    quantidade_materiaprima int(11)  DEFAULT NULL,
    valor_materiaprima decimal(10,2) DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `produto_id_fk` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `materia_primas_id_fk` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

  CREATE TABLE clientes  (
    id int(11) NOT NULL AUTO_INCREMENT,
    nome varchar(100)  DEFAULT NULL,
    cpf varchar(14)  DEFAULT NULL,
    cnpj varchar(14) DEFAULT NULL,
    estabelecimento_id int(11) DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `estabelecimento_id_fk_clientes` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

  CREATE TABLE vendas  (
    id int(11) NOT NULL AUTO_INCREMENT,
    numero int(11) DEFAULT NULL,
    produto_id int(11)  DEFAULT NULL,
    cliente_id int(11)  DEFAULT NULL,
    total_produto decimal(10,2) DEFAULT NULL,
    total_desconto decimal(10,2) DEFAULT NULL,
    estabelecimento_id int(11) DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `estabelecimento_id_vendas` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `produto_venda_id_fk` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `cliente_venda_id_fk` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


