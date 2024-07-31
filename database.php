<?php

spl_autoload_register(function (string $nomeCompleto) {
    $caminhoArquivo = str_replace('Alura\\Banco', 'src', $nomeCompleto);
    $caminhoArquivo = str_replace('\\', DIRECTORY_SEPARATOR, $caminhoArquivo);
    $caminhoArquivo .= '.php';

    echo $caminhoArquivo . PHP_EOL;
    exit();
});

use Domain\Address;
use Domain\CPF;
use Entities\Account;
use Entities\Holder;

$address = new Address('Porto Alegre', 'Centro', 'Rua A', '123');
$igor = new Holder(new CPF('123.456.789-10'), 'Igor Castilhos', $address);
$firstAccount = new Account($igor);
$firstAccount->deposit(500);
$firstAccount->withdraw(300);

echo $firstAccount->getHolderName() . PHP_EOL;
echo $firstAccount->getHolderCpf() . PHP_EOL;
echo $firstAccount->getBalance() . PHP_EOL;

$maria = new Holder(new CPF('987.654.321-10'), 'Maria Silva', $address);
$secondAccount = new Account($maria);
var_dump($secondAccount);

$anotherAddress = new Address('São Paulo', 'Centro', 'Rua B', '321');
$anotherAccount = new Account(new Holder(new CPF('987.653.321-10'), 'Abcdefg', $anotherAddress));
unset($secondAccount);
echo Account::getNumberOfAccounts();
