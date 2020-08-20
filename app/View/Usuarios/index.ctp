<?php
$this->extend('/Elements/index');
$this->assign('title', 'Usuários');
$searchFields .= $this->Form->input(
    'Usuario.nome_or_cpf',
    array(
        'placeholder' => 'Nome ou CPF',
        'label' => array('class' => 'sr-only'),
        'class' => 'form-control mr-2',
        'div' => false,
        'requisicaoAjax' => 'post'
    )
);

$this->assign('searchFields', $searchFields);

$titulos = array(
    array($this->Paginator->sort('Usuario.login', 'Login') => array('width' => '8%')),
    array('Nome' => array('width' => '12%')),
    array('E-mail' => array('width' => '10%')),
    array('Função' => array('width' => '7%')),
    array('Situação' => array('width' => '10%')),
    array(' ' => array('width' => '15%'))
);

$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

$detalhe = array();
foreach ($usuarios as $usuario) {
    $editLink = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pen')), '/usuarios/edit/' . $usuario['Usuario']['id'], array('update' => '#content', 'class' => 'btn btn-secondary float-right ml-2', 'escape' => false, 'title' => 'Alterar'));
    $alterarsenhaLink = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-key')), '/usuarios/alterarsenha/' . $usuario['Usuario']['id'], array('update' => '#content', 'class' => 'btn btn-secondary float-right ml-2', 'escape' => false,'title' => 'Alterar Senha'));

   
    if (empty($usuario['Usuario']['blocked'])) {
        $usuario['Usuario']['blocked'] = 'Ativo';
        $colorTextSituacao = 'text-success';
    }

    $detalhe[] = array(
        $usuario['Usuario']['login'],
        $usuario['Usuario']['nome'],
        $usuario['Usuario']['email'],
        $usuario['Usuario']['funcao'],
        $this->Html->tag('span', $usuario['Usuario']['blocked'], array('class' => $colorTextSituacao)),
        $desbloquearLink.$alterarsenhaLink.$editLink 
    );
}

$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);