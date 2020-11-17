<?php
$this->extend('/Elements/index');
$this->assign('title', 'Clientes');
$searchFields .= $this->Html->div('form-row',
    $this->Form->input('Categoria.nomeCpf', array(
        'placeholder' => 'Nome/CPF', 
        'label' => array('class' => 'sr-only'),
        'class' => 'form-control col-md-15',
        'div' => false          
    ))
);
$this->assign('searchFields', $searchFields);

$titulos = array(
    array($this->Paginator->sort('Cliente.nome', 'Nome') => array( 'width' => '25%', 'title' => 'Ordenar por Nome' )),
    array('CPF' => array('width' => '2%')),
    array('' => array( 'width' => '0%' )),
);

$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);
$detalhe = array();
    foreach ($clientes as $cliente) {
        $ClienteView = $this->Js->link($cliente['Cliente']['nome'], '/clientes/view/' . $cliente['Cliente']['id'], array('update' => '#content'));
        $excluir = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-trash-alt text-danger  fa-lg')), '/clientes/delete/' . $cliente['Cliente']['id'], array(
            'update' => '#content',
            'class' => 'btn btn-secondary float-right ml-2',
            'escape' => false
        ));

        $alterar = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt fa-lg')), '/clientes/edit/' . $cliente['Cliente']['id'], array(
            'update' => '#content',
            'class' => 'btn btn-secondary float-right ',
            'escape' => false
        ));

        $detalhe[] = array(     
        $ClienteView,
        $cliente['Cliente']['cpf'],
        $alterar . $excluir
    );
}

$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);

?>    
   

  


