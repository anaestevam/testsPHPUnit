<?php
require 'vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

$filepath = __DIR__ . '/swagger.yaml';

try {
    if (!file_exists($filepath)) {
        throw new Exception("Arquivo Swagger não encontrado em $filepath");
    }

    $yamlContent = file_get_contents($filepath);

    $parsed = Yaml::parse($yamlContent);

    if (!isset($parsed['openapi']) || !isset($parsed['paths'])) {
        throw new Exception("Arquivo Swagger inválido: campos básicos não encontrados.");
    }

    echo "Arquivo Swagger válido!\n";

} catch (ParseException $e) {
    echo "Erro na análise YAML: " . $e->getMessage() . "\n";
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage() . "\n";
}
