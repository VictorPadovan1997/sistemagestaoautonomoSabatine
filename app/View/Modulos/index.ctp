<?php
$this->extend('/Elements/index');


$searchFields .= $this->Html->div('form-row',
$this->Form->input('Modulo.nome', array(
    'placeholder' => 'Nome', 
    'label' => array('class' => 'sr-only'),
    'class' => 'form-control col-md-11 mr-2',
    'div' => false          
))
);
$this->assign('searchFields', $searchFields);


$titulos = array(
    array($this->Paginator->sort('Modulo.nome', 'Nome') => array('width' => '0%',  'class'=>"hint--bottom", 'aria-label'=>"Ordenar por Nome")),
    array('' => array('width' => '0%')),
);
   
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

   $detalhe = array();
   foreach ($modulos as $modulo) {
    $excluir = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-trash-alt')), '/modulos/delete/' . $modulo['Modulo']['id'], array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right ml-2',
        'escape' => false
    ));

    $alterar = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt')), '/modulos/edit/' . $modulo['Modulo']['id'], array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right ml-2',
        'title' => 'Alterar',
        'escape' => false
    ));

    $moduloView = $this->Js->link($modulo['Modulo']['nome'], '/modulos/view/' . $modulo['Modulo']['id'], array('update' => '#content'));

 
    $detalhe[] = array(     
    $moduloView,
    $excluir . ' ' . $alterar
    );

}

$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);
?>    
