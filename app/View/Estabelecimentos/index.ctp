<?php
$this->extend('/Elements/index');


$searchFields .= $this->Html->div('form-row',
$this->Form->input('Estabelecimento.nome_fantasia', array(
    'placeholder' => 'Nome', 
    'label' => array('class' => 'sr-only'),
    'class' => 'form-control col-md-11 mr-2',
    'div' => false          
))
);
$this->assign('searchFields', $searchFields);


$titulos = array(
    array($this->Paginator->sort('  Estabelecimento.nome_fantasia', 'Nome') => array('width' => '0%',  'class'=>"hint--bottom")),
    array('' => array('width' => '0%')),
);
   
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

   $detalhe = array();
   foreach ($estabelecimentos as $estabelecimento) {
    $excluir = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-trash-alt')), '/estabelecimentos/delete/' . $estabelecimento['Estabelecimento']['id'], array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right ml-2',
        'escape' => false
    ));

    $alterar = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt')), '/estabelecimentos/edit/' . $estabelecimento['Estabelecimento']['id'], array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right ml-2',
        'title' => 'Alterar',
        'escape' => false
    ));

    $view = $this->Js->link($estabelecimento['Estabelecimento']['nome_fantasia'], '/estabelecimentos/view/' . $estabelecimento['Estabelecimento']['id'], array('update' => '#content'));

 
    $detalhe[] = array(     
    $view,
    $excluir . ' ' . $alterar
    );

}

$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);
?>    
