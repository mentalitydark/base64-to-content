## Exibindo conteúdo a partir de base64

Primeiro de tudo será necessário uma string base64 e com isso você define o mime type referente ao conteúdo.
Caso você só tenha a base64, você pode obter através desse código:

##### Código de exemplo
```php
<?php

// É necessário que a extensão fileinfo esteja ativo no php.ini

$base64 = "Sua string base64 aqui.";

$fileInfo = new finfo(FILEINFO_MIME_TYPE);
$mimeType = $fileInfo->buffer(file_get_contents("data:;base64,$base64"));

?>
```

Tendo o mime type e o base64 basta você definir o header Content-Type e exibir o conteúdo do base64 utilizando `echo` e `file_get_contents`.

##### Código de exemplo
```php
<?php

header("Content-Type: {$mimeType}");
header("Content-Disposition: inline; filename=\"Nome de saída do arquivo . extensão\";"); // Caso você queira definir um nome para o download. Não é obrigatório.

echo file_get_contents("data://{$mimeType};base64,$content");

?>
```

Prontinho! Agora você consegue visualizar seus arquivos utilizando o PHP.
Nesse repositório é possível encontrar um arquivo de exemplo e arquivos para testes também.